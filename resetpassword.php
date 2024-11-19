
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Retro_devices";

// Step 1: Create a connection to the MySQL server (without specifying a database)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to the server
if ($conn->connect_error) {
  die("Connection to MySQL server failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['password'];

    // Password strength validation
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newPassword)) {
        // If the password does not meet the criteria, redirect back with an error message
        header("Location: resetpassword.php?error=weak_password");
        exit();
    }
    // Sanitize inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);
    
    // Update password in the database
    $sql = "UPDATE Users SET password='$newPassword' WHERE User_email='$email'";
    
    if (mysqli_query($conn, $sql)) {
        // Redirect to the login page with a success message
        header("Location: Login.php?reset=success");
        exit();
    } else {
        // Handle error
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rtero Devices</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
   <script src="/scripts.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- ------------navbar--------------------- -->
    <nav class="navbar"> 
        <div class="logo">
            <a href="index.php">Retro Devices</a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Devices</a>
                <ul class="dropdown-menu">
                    <li><a href="Sony.php">Sony</a></li>
                    <li><a href="Nintendo.php">Nintendo</a></li>
                    <li><a href="Atari.php">Atari</a></li>
                </ul>
            </li>
    
            <li><a href="#feedback">Feedback</a></li>
            <li id="userProfile">
                <a href="Login.php#login"><i class="bi bi-person-circle"></i></a>
            </li>
    
            <li>
                <form method="post" action="search_result.php">
                    <div class="search-container">
                        <input type="text" id="search-bar" class="search-input" name="search" placeholder="Type / to search">
                        <button type="submit" name="submit" class="searchbutton"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </li>
        </ul>
    </nav>

        <section id="login" class="form-section">
            <h2 style="text-align: center;">Reset Password</h2>
            <form class="form-form"  method="POST">
            <?php if (isset($_GET['error']) && $_GET['error'] == 'weak_password'): ?>
            <p style="color: red;">Password must be at least 8 characters, include one uppercase letter, one number, and one special character.</p>
            <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-actions">
                  <button  class="button" type="submit">reset password</button>
                </div>
            </form>

        </section>

        
     

<footer class="footer">
    <p>&copy; 2024 Retro Devices. All rights reserved.</p>
    <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
</footer>

  
</body>
</html>