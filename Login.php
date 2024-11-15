<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Retro_devices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if user exists
    $sql = "SELECT * FROM Users WHERE User_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // User exists, validate password
        if ($password === $user["password"]) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
        } else {
            // Invalid password
            $is_invalid = true;
        }
    } else {
        // User does not exist, redirect to sign-up page
        header("Location: SignUp.php?error=Account not found, please sign up");
        exit;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Devices</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="scripts.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- Navbar -->
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
                <div class="search-container">
                    <input type="text" id="search-bar" class="search-input" placeholder="Type / to search">
                    <button class="searchbutton"><i class="bi bi-search"></i></button>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Login Section -->
    <section id="login" class="form-section">
        <h2 style="text-align: center;">Login</h2>
        
        <form class="form-form" id="login-form" oninput="checkFormValidity('login-form', 'login-submit')" method="POST">
            <?php if ($is_invalid): ?>
                <em>Invalid Login</em>
            <?php endif; ?>
            <div class="form-group">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" required>
            </div>
            <div class="form-actions">
                <button type="submit" id="login-submit" class="button" disabled>Login</button>
            </div>
        </form>


        <p>Don't have an account? <a href="SignUp.php">Sign up here</a>.</p>
        <p><a href="resetpassword.php">Forgot Password?</a></p>
    </section>

    <footer class="footer">
        <p>&copy; 2024 Retro Devices. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
    </footer>
</body>
</html>
