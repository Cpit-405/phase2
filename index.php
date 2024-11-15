<!--Team Members:-->
<!--Samaher Saud - 2108986-->
<!--Hebah Alahmari - 2105304-->
<!--Reem Alhussaini - 2105023-->
<!--Lama Althabiti - 2112562-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $feedback_type = $_POST["feedback-type"];
    $message = htmlspecialchars(trim($_POST["message"]));

    // Database details
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "Retro_devices";

    // Save to database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO Feedback (name, email, feedback_type, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $feedback_type, $message);

    if ($stmt->execute()) {
        $success_message = "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Display Success Message -->
<?php if (isset($success_message)) : ?>
    <p class="success"><?php echo $success_message; ?></p>
<?php endif; ?>


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
   <script src="scripts.js"></script>
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
                <div class="search-container">
                    <input type="text" id="search-bar" class="search-input" placeholder="Type / to search">
                    <button class="searchbutton"><i class="bi bi-search"></i></button>
                </div>
            </li>
        </ul>
    </nav>
    
    <!-- ------------1st section--------------------- -->
    <section class="section1">
        <div class="section1-content">
            <h1>Explore Retro Devices</h1>
            <p>Discover the timeless classics from Sony, Nintendo, and more.</p>
            <a href="#category" class="btn">Explore More</a>
        </div>
        <div class="hero-image">
            <img src="images\bg3.png" width="700" alt="Retro Device"> 
        </div>
    </section>
  
      <!-- ------------2nd section--------------------- -->

      <section id="category" class="categories">
    <h2>Explore Our Categories</h2>
    <div class="category-grid">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="category">
                    <?php
                    echo '<a href="' . $row['category_name'] . '.php">';
                    echo '<img src="images/' . $row['img1'] . '" alt="' . $row['category_name'] . '">';
                    echo '<h3>' . $row['category_name'] . '</h3>';
                    echo '</a>';
                    echo '<p>' . $row['shortDescription'] . '</p>';
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div> 
</section>
   

      <!-- ------------3rd section--------------------- -->
      
    <!-- Feedback Section -->
    <section id="feedback" class="feedback-section">
        <h2>Give Us Your Feedback</h2>
        <p>Your feedback helps us improve. Please fill out the form below.</p>

        <form class="feedback-form" id="feedback-form" oninput="checkFormValidity('feedback-form', 'feedback-submit')" method="POST">
            <div class="form-group">
                <label for="feedback-email">Email</label>
                <input type="email" id="feedback-email" name="email" required oninput="validateEmail('feedback-email', 'feedback-email-feedback')">
                <span id="feedback-email-feedback"></span>
            </div>
            <div class="form-group">
                <label for="feedback-type">Feedback Type</label>
                <select id="feedback-type" name="feedback-type" required>
                    <option value="">Select...</option>
                    <option value="suggestion">Suggestion</option>
                    <option value="complaint">Complaint</option>
                    <option value="compliment">Compliment</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" id="feedback-submit" class="submit-button" disabled>Submit Feedback</button>
                <button type="reset" class="reset-button">Reset</button>
            </div>
        </form>
    </section>



<footer class="footer">
    <p>&copy; 2024 Retro Devices. All rights reserved.</p>
    <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
</footer>

  
</body>
</html>