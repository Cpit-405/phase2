<!--Team Members:-->
<!--Samaher Saud - 2108986-->
<!--Hebah Alahmari - 2105304-->
<!--Reem Alhussaini - 2105023-->
<!--Lama Althabiti - 2112562-->
<?php
include '/Applications/MAMP/htdocs/Phase1-cpit405/Queries-405.php';
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
                    <li><a href="Nintendo.html">Nintendo</a></li>
                    <li><a href="Atari.html">Atari</a></li>
                </ul>
            </li>
    
            <li><a href="#feedback">Feedback</a></li>
            <li id="userProfile">
                <a href="Login.html#login"><i class="bi bi-person-circle"></i></a>
            </li>
    
            <li>
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Search...">
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

        <section id="feedback" class="feedback-section">
            <h2>Give Us Your Feedback</h2>
            <p>Your feedback helps us improve. Please fill out the form below.</p>
            <form class="feedback-form" id="form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  id="name" name="name" onfocus="focusFunction(id)"  onblur="blurFunction(id)" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" onfocus="focusFunction(id)" onblur="blurFunction(id)"  >
                </div>
                <div class="form-group">
                    <label for="feedback-type">Feedback Type</label>
                    <select id="feedback-type" name="feedback-type" onfocus="focusFunction(id)" onblur="blurFunction(id)"  >
                        <option selected value="suggestion">Suggestion</option>
                        <option value="complaint">Complaint</option>
                        <option value="compliment">Compliment</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" onfocus="focusFunction(id)" onblur="blurFunction(id)" ></textarea>
                </div>
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