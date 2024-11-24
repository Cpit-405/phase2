<!--Team Members:-->
<!--Samaher Saud - 2108986-->
<!--Hebah Alahmari - 2105304-->
<!--Reem Alhussaini - 2105023-->
<!--Lama Althabiti - 2112562-->
<?php
include 'project405.php';
include 'Queries-405.php';

$errors = [];
$name = $email = $feedback_type = $message = ""; // Initialize variables to retain form data

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    if (empty($_POST["name"])) {
        $errors[] = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errors[] = "Only letters and white space allowed in name.";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    // Validate feedback type
    $allowed_types = ["suggestion", "complaint", "compliment"];
    if (empty($_POST["feedback-type"]) || !in_array($_POST["feedback-type"], $allowed_types)) {
        $errors[] = "Invalid feedback type.";
    } else {
        $feedback_type = $_POST["feedback-type"];
    }

    // Validate message
    if (empty($_POST["message"])) {
        $errors[] = "Message is required.";
    } else {
        $message = htmlspecialchars(trim($_POST["message"]));
    }

    // Database details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Retro_devices";

    // If no errors, save to database
    if (empty($errors)) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO Feedback (name, email, feedback_type, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $feedback_type, $message);

        if ($stmt->execute()) {
            $success_message = "Feedback submitted successfully!";
        } else {
            $errors[] = "Failed to submit feedback.";
        }

        $stmt->close();
        $conn->close();
    }
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
                <form method="post" action="search_result.php">
                    <div class="search-container">
                        <input type="text" id="search-bar" class="search-input" name="search" placeholder="Type / to search">
                        <button type="submit" name="submit" class="searchbutton"><i class="bi bi-search"></i></button>
                    </div>
                </form>
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
                    echo '<img src="images/' . $row['img1'] . '" alt="' .  $row['category_name'] . '" class="category-img">';
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
      
      <section id="feedback" class="feedback-section">
        <h2>Feedback</h2>

        <form class="feedback-form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '#feedback'; ?>" method="POST">
       
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" onfocus="focusFunction(id)" onblur="blurFunction(id)"  value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" onfocus="focusFunction(id)" onblur="blurFunction(id)"  value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-group">
                <label for="feedback-type">Feedback Type</label>
                <select id="feedback-type" name="feedback-type" onfocus="focusFunction(id)" onblur="blurFunction(id)" >
                    <option value="">Select...</option>
                    <option value="suggestion" <?php if ($feedback_type == "suggestion") echo "selected"; ?>>Suggestion</option>
                    <option value="complaint" <?php if ($feedback_type == "complaint") echo "selected"; ?>>Complaint</option>
                    <option value="compliment" <?php if ($feedback_type == "compliment") echo "selected"; ?>>Compliment</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" onfocus="focusFunction(id)" onblur="blurFunction(id)" ><?php echo htmlspecialchars($message); ?></textarea>
            </div>
                     
            <!-- Display success or error messages -->

           <?php 
           
             if (!empty($success_message)) {
                echo "<div style='color:green;'>" . htmlspecialchars($success_message) . "</div>";
            }
           
            if (!empty($errors)) {
                echo "<div style='color: red; text-align: left;'>"; 
                foreach ($errors as $error) {
                    echo htmlspecialchars($error) . "<br>"; 
                }
                echo "</div>";
            }
            ?>
            <div class="form-actions">
                <button type="submit" class="submit-button">Submit Feedback</button>
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