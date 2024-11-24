<?php
include 'project405.php';
include 'Queries-405.php';
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
    
    <h2 style="text-align:center;">Search Results</h2>

    <?php
    if (isset($_POST['submit'])) {
        $search = trim($_POST['search']); // Get the user input from search

        if (empty($search)) {
            echo "<p style='text-align:center'>Please enter a device name to search.</p>";
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "Retro_devices";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Escape user input to prevent SQL injection
            $search = mysqli_real_escape_string($conn, $search);

            // SQL Query for search
            $sql = "
                (
                    SELECT DISTINCT 
                        d.device_name, 
                        d.description, 
                        d.image_url AS device_image, 
                        g.game_name, 
                        g.image_url AS game_image
                    FROM 
                        SonyDevice d
                    LEFT JOIN 
                        SonyGames g ON d.device_id = g.game_id
                    WHERE 
                        d.device_name LIKE '%$search%'
                )
                UNION ALL
                (
                    SELECT DISTINCT 
                        d.device_name, 
                        d.description, 
                        d.image_url AS device_image, 
                        g.game_name, 
                        g.image_url AS game_image
                    FROM 
                        NintendoDevice d
                    LEFT JOIN 
                        NintendoGames g ON d.device_id = g.game_id
                    WHERE 
                        d.device_name LIKE '%$search%'
                )
                UNION ALL
                (
                    SELECT DISTINCT 
                        d.device_name, 
                        d.description, 
                        d.image_url AS device_image, 
                        g.game_name, 
                        g.image_url AS game_image
                    FROM 
                        AtariDevice d
                    LEFT JOIN 
                        AtariGames g ON d.device_id = g.game_id
                    WHERE 
                        d.device_name LIKE '%$search%'
                )";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='device-table'>";
                $current_device = null;

                while ($row = $result->fetch_assoc()) {
                    if ($row['device_name'] !== $current_device) {
                        if ($current_device !== null) {
                            echo "</td></tr>";
                        }
                        $current_device = $row['device_name'];

                        echo "<thead>";
                        echo "<tr>";
                        echo "<td colspan='3'>";
                        echo "<h3>" . htmlspecialchars($row['device_name']) . "</h3>";
                        echo "<ul><li><p>Description: " . htmlspecialchars($row['description']) . "</p></li></ul>";
                        echo "</td>";
                        echo "<td><img src='images/" . htmlspecialchars($row['device_image']) . "' alt='Device Image'></td>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td colspan='4'>";
                    }

                    if (!empty($row['game_name'])) {
                        echo "<div class='image-container'>";
                        echo "<img src='images/" . htmlspecialchars($row['game_image']) . "' alt='Game Image'>";
                        echo "<p>" . htmlspecialchars($row['game_name']) . "</p>";
                        echo "</div>";
                    }
                }

                echo "</td></tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p style='text-align:center'>No results found for '<b>" . htmlspecialchars($search) . "</b>'.</p>";
            }

            // Close connection
            $conn->close();
        }
    }
    
    ?>

   
    

 <footer class="footer">
    <p>&copy; 2024 Retro Devices. All rights reserved.</p>
    <p>Contact us: <a href="mailto:info@retrodvices.com">info@retrodvices.com</a></p>
</footer>

  
</body>
</html>