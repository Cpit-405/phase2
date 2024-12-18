<?php
include 'Queries-405.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sony</title>
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

<div class="logoo">
    <?php
    if ($resultSony && $resultSony->num_rows > 0) {
        while ($row =mysqli_fetch_assoc($resultSony)) {
            echo '<img src="images/' . $row['image_url'] . '" alt="' .$row['category_name'] . ' Logo">';
            echo '<div class="company-info">';
            echo '<p>' . $row['description'] . '</p>';
            echo '<a href="' . $row['Weblink'] . '">Click here for more Information</a>';
            echo '</div>';
        }
    } 

    ?>
</div>

<?php


$current_device_name = '';
if ($resultSonypage->num_rows > 0) {
    $index = 1;
    while ($row =$resultSonypage->fetch_assoc()) {
        
        if ($row['device_name'] != $current_device_name) {
            if ($current_device_name != '') {
                echo "</tbody></table>";
            }

            echo "<table class='device-table'>";
            echo "<thead><tr><td colspan='3'>";
            echo "<h3> Device " . $index . " : </h3>";
            echo "<ol><li>" . $row['device_name'] . "</li>";
            echo "<ul><li><p>Description: " . $row['description'] . "</p></li></ul></ol>";
            echo "</td><td><img src='images/" . $row['device_image'] . "' alt='" . $row['device_name'] . "' class='category-img'></td></tr></thead>";;
            echo "<tbody><tr><td colspan='4'>";
            
            $current_device_name = $row['device_name'];
            $index++;
        }
        if (!empty($row['game_name'])) {
        echo "<div class='image-container'>";
        echo "<img src='images/" . $row['game_image'] . "' alt='" . $row['game_name'] . "' class='game-img'>";
        echo "<p>" . $row['game_name'] . "</p></div>";
    }
}

    echo "</td></tr></tbody></table>";
} 

?>


<footer class="footer">
    <p>&copy; 2024 Retro Devices. All rights reserved.</p>
    <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
</footer>


</body>
</html>
