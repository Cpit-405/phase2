<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname="Retro_devices";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname );

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// retrive categories - FIRST Page-
$sql = "SELECT category_name, img1, shortDescription FROM categories";
$result = $conn->query($sql);

// retrive sony info - Sony Page-
$sonyPage = "SELECT * FROM categories WHERE category_name = 'Sony'";
$resultSony = $conn->query($sonyPage);


//  query to retrive sony devices and its games 
$sqlSontPage = "SELECT 
            d.device_name, 
            d.description, 
            d.image_url AS device_image, 
            g.game_name, 
            g.image_url AS game_image
        FROM 
            SonyDevice d
        JOIN 
            SonyGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_name, g.game_name";

// Execute the query
$resultSonypage = $conn->query($sqlSontPage);



// retrive sony info - Nintedo Page-
$NintedoPage = "SELECT * FROM categories WHERE category_name = 'Nintendo'";
$resultNintedo = $conn->query($NintedoPage);

//  query to retrive nintendo devices and its games 
$sqlNintedoPage = "SELECT 
            d.device_name, 
            d.description, 
            d.image_url AS device_image, 
            g.game_name, 
            g.image_url AS game_image
        FROM 
            NintendoDevice d
        JOIN 
            NintendoGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_name, g.game_name";

$resultNintedopage = $conn->query($sqlNintedoPage);


// retrive sony info - ATARI Page-
$AtariPage = "SELECT * FROM categories WHERE category_name = 'Atari'";
$resultAtari = $conn->query($AtariPage);

//  query to retrive Atari devices and its games 
$sqlAtariPage = "SELECT 
            d.device_name, 
            d.description, 
            d.image_url AS device_image, 
            g.game_name, 
            g.image_url AS game_image
        FROM 
            AtariDevice d
        JOIN 
            AtariGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_name, g.game_name";

$resultAtaripage = $conn->query($sqlAtariPage);

$conn->close();

?>
