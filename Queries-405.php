<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Retro_devices";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to the server
if ($conn->connect_error) {
  die("Connection to MySQL server failed: " . $conn->connect_error);
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
        LEFT JOIN 
            SonyGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_id ";

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
        LEFT JOIN 
            NintendoGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_id ";

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
        LEFT JOIN 
            AtariGames g ON d.device_id = g.game_id
        ORDER BY 
            d.device_id ";

$resultAtaripage = $conn->query($sqlAtariPage);

//----------------------------------------------
// queries ADD, delete and update -
// - --------- add device to sony ------------------------
// $sqlAddDevice = "INSERT INTO SonyDevice (device_name, description, image_url) VALUES 
//               ('Handheld Console', 'The RG35XX is an amazing budget retro gaming handheld that plays many of your favourite classic consoles. The RG35XX features the Actions ATM7039S quad-core processor running up to 1.6GHz with a quad-core PowerVR SGX544MP GPU. Combined, they provide enough performance for all 4th-generation gaming consoles and some newer ones. The retro gaming handheld comes with 256MB DDR3 RAM, which is more than enough for the OS and emulator for the gaming consoles it supports. The 3.5\" IPS display runs at a 640x480 resolution at a 4:3 aspect ratio, which is perfect for retro gaming.', '3Device.jpg')";

// if (!$conn->query($sqlAddDevice) === TRUE) {
//        die("Error: " . $conn->error);
//     }

// ----- delete device and its games ------------------- 
// $sqlDelete ="DELETE d, g
// FROM SonyDevice d
// LEFT JOIN SonyGames g ON d.device_id = g.game_id
// WHERE d.device_name = 'Handheld Game Console'";

// if (!$conn->query($sqlDelete) === TRUE) {
//       die ( "Error: " . $conn->error);
//     }

// --------  update image category in homepgae query ---------------
// $sqlUpdate = "UPDATE categories
//               SET img1 ='ps1.jpg'
//               WHERE category_name = 'Sony'
//               "; 
//  if (!$conn->query($sqlUpdate) === TRUE) {
//           die ( "Error: " . $conn->error);
//      }             
$conn->close();

?>
