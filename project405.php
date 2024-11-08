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
echo "Connected successfully";


// $sql = "CREATE TABLE Users (
//     User_id INT PRIMARY KEY AUTO_INCREMENT,
//     User_email VARCHAR(100) NOT NULL,
//     password VARCHAR(255) NOT NULL
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// // --  category table
// $Categorysql ="CREATE TABLE Categories (
//     category_id INT PRIMARY KEY AUTO_INCREMENT,
//     category_name VARCHAR(50) NOT NULL,
//     description TEXT
//     image_url VARCHAR(50)
//     shortDescription VARCHAR(255),
//     img1 VARCHAR(50),
       // Weblink VARCHAR(255),

// )";
// if ($conn->query($Categorysql) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
// }

// // --  Devices table
// $SonyDevice = "CREATE TABLE SonyDevice (
//     device_id INT PRIMARY KEY AUTO_INCREMENT,
//     device_name VARCHAR(100) NOT NULL,
//     description TEXT,
//     image_url VARCHAR(255),
//     category_id INT,
//     FOREIGN KEY (category_id) REFERENCES Categories(category_id)
// )";
// if ($conn->query($SonyDevice) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }
// //------------------------------


// $NintedoDevice ="CREATE TABLE NintendoDevice (
//     device_id INT PRIMARY KEY AUTO_INCREMENT,
//     device_name VARCHAR(100) NOT NULL,
//     description TEXT,
//     image_url VARCHAR(255),
//     category_id INT,
//     FOREIGN KEY (category_id) REFERENCES Categories(category_id)
// )";

// if ($conn->query($NintedoDevice) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }
//   //------------------------





// $AtariDevice ="CREATE TABLE AtariDevice (
//     device_id INT PRIMARY KEY AUTO_INCREMENT,
//     device_name VARCHAR(100) NOT NULL,
//     description TEXT,
//     image_url VARCHAR(255),
//     category_id INT,
//     FOREIGN KEY (category_id) REFERENCES Categories(category_id)
// )";

// if ($conn->query($AtariDevice) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }


// --  SonyGames table

// $SonyGames ="CREATE TABLE SonyGames (
//     game_id INT,
//     game_name VARCHAR(100) NOT NULL,
//     image_url VARCHAR(255),
//     device_id INT,
//     FOREIGN KEY (device_id) REFERENCES SonyDevice(device_id)
// )";

// if ($conn->query($SonyGames) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }

// // --  NintendoGames table
// $NintendoGames="CREATE TABLE NintendoGames (
//     game_id INT,
//     game_name VARCHAR(100) NOT NULL,
//     image_url VARCHAR(255),
//     device_id INT,
//     FOREIGN KEY (device_id) REFERENCES NintendoDevice(device_id)
// )";

// if ($conn->query($NintendoGames) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
// }

// // --  AtariGames table
// $AtariGames= "CREATE TABLE AtariGames (
//     game_id INT,
//     game_name VARCHAR(100) NOT NULL,
//     image_url VARCHAR(255),
//     device_id INT,
//     FOREIGN KEY (device_id) REFERENCES AtariDevice(device_id)
// )";

// if ($conn->query($AtariGames) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
// }

// --  Feedback table
// $Feedback="CREATE TABLE Feedback (
//     feedback_id INT PRIMARY KEY AUTO_INCREMENT,
//     name VARCHAR(50),
//     email VARCHAR(100),
//     message TEXT,
//     feedback_type ENUM('suggestion', 'complaint', 'compliment') NOT NULL
// )";

// if ($conn->query($Feedback) === TRUE) {
//     echo "Table created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
// }

// -------------INSERTING VALUES ----------------------------
// $categories = "INSERT INTO Categories (category_name, description , image_url, shortDescription, img1, Weblink) VALUES
//     ('Sony', 'Sony is a Japanese multinational company known for its innovative electronics, including retro devices that left a significant mark in tech history. Iconic products like the Sony Walkman, released in 1979, revolutionized portable music, allowing people to carry their favorite tunes on the go. The PlayStation, introduced in 1994, transformed the gaming industry, setting new standards for home entertainment. Sony\'s retro devices are celebrated for their sleek design, durability, and cutting-edge technology for their time, making them nostalgic favorites for tech enthusiasts.','Sony-logo.jpg','Explore the classic and innovative devices from Sony','ps2.jpg' , 'https://atari.fandom.com/wiki/Atari_Wiki'),

//     ('Nintendo', 'Nintendo is a global leader in the gaming industry, known for creating innovative video game consoles, handheld devices, and beloved franchises. Founded in Japan in 1889, the company shifted its focus to video games in the 1980s, producing iconic consoles like the NES, Game Boy, Wii, and Nintendo Switch. Nintendo\'s extensive catalog includes some of the most popular games in history, such as Super Mario, The Legend of Zelda, and Pokémon. Renowned for its creativity, family-friendly content, and engaging gameplay experiences, Nintendo continues to shape the future of gaming.', 'nintendo-logo.png', 'Discover the beloved and iconic devices from Nintendo.','Nintendo-home.jpg','https://nintendo.fandom.com/wiki/List_of_Nintendo_systems'),

//     ('Atari', 'The Atari Lynx, released in 1989, was the first handheld gaming console with a full-color display and backlighting, offering advanced graphics and capabilities for its time. It featured a unique ambidextrous design, allowing players to flip the device and switch between left- and right-handed controls. The Lynx also supported multiplayer gaming through a link cable, enabling up to eight players to connect their devices. Despite its technological innovations, including scaling and sprite manipulation for 3D-like effects, the Lynx struggled in the market due to competition from the Nintendo Game Boy, which had better battery life and a larger game library. Nonetheless, the Atari Lynx remains a significant part of gaming history for its early advancements in handheld gaming.','Atari-logo.png', 'Find other classic devices from Atari.', 'Atari2600-home.jpg' , 'https://atari.fandom.com/wiki/Atari_Wiki')";

// if ($conn->query($categories) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }
/// SONY DEVICE

// $sqlSonyDevice = "INSERT INTO SonyDevice (device_name, description, image_url) VALUES
//     ('PlayStation 1', 'The Sony PlayStation 1 (PS1), released in 1994, was a groundbreaking gaming console that shifted the industry towards 3D graphics and CD-based games. Its sleek, compact design and powerful hardware allowed developers to create immersive experiences, making it a favorite among gamers. The PS1 also introduced features like memory cards for saving progress and a controller layout that became a standard in gaming. As Sony’s first major step into the gaming world, the PS1 left a lasting legacy and remains a beloved retro device.', 'ps1.jpg'),

//     ('PlayStation 2', 'The Sony PlayStation 2 (PS2), launched in 2000, is one of the most successful gaming consoles of all time. Its powerful hardware and ability to play DVDs helped it become a versatile entertainment system for many households. The PS2\'s backward compatibility with PlayStation 1 games gave it a huge advantage, allowing gamers to continue enjoying their favorite titles from the previous generation. With a sleek design and massive library of games, the PS2 solidified Sony\'s dominance in the gaming industry and remains a nostalgic favorite among retro console enthusiasts.', 'ps2.jpg'),

//     ('PSP-3000', 'The Sony PSP-3000, released in 2008, was an upgraded version of the original PlayStation Portable. It featured a brighter, higher-quality LCD screen with improved color and reduced motion blur, making portable gaming more visually appealing. The PSP-3000 maintained its sleek, lightweight design, making it perfect for on-the-go gaming, media playback, and internet browsing. With a built-in microphone for voice chat and compatibility with a wide range of digital content, the PSP-3000 stood out as a versatile and stylish handheld console in the world of portable gaming.', 'psp3000.jpg')
// ";

// if ($conn->query($sqlSonyDevice) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }
// /// NINTEDO DEVICE

// $NintendoDevice = "INSERT INTO NintendoDevice (device_name, description, image_url) VALUES
//     ('Super Famicom', 'The Super Nintendo Entertainment System featured much enhanced graphics, a brand new controller, and more. It was the 16-bit console by Nintendo. Though it sold well (around 49 million units), the Sega Genesis was a major competitor to the SNES, with both Nintendo and Sega giving an extensive ad campaign calling out both sides. Like the NES, it had a redesign late in its life, this time being the Super Famicom Jr. in Japan and New-Style SNES in other regions. (1991)', 'SANS.png'),

//     ('Nintendo 64', 'The Nintendo 64 featured greatly improved graphics, now 3D, and a new controller that introduced the modern joystick. It was also the first home console to have four controller ports built into the system. It sold around 32 million units. With its lack of a disc format, the lack of strong third-party support, and it being released after its competitors\' consoles, it could not sell as well as the PlayStation. (1996)', '64.png'),

//     ('Nintendo GameCube', 'The GameCube featured enhanced graphics and a new controller. As the games came on mini-disc it was the first Nintendo home console to solely use a disc format for games. It was also the first (and only) Nintendo system to require additional memory cards in order to save progress. Though not Nintendo\'s worst selling home console, it sold around 22 million units, being no match for the PlayStation 2, which was very popular, even to this day, being the best selling console overall. (2001)', 'GC.png')
// ";

// if ($conn->query($NintendoDevice) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }
//  // ATARI DEVICE _--------------------

//  $AtariDevice = "INSERT INTO AtariDevice (device_name, description, image_url) VALUES
//     ('Atari 2600', 'The Atari 2600, released in 1977, is one of the first home video game consoles and a pioneer of the gaming industry. Known for popularizing home gaming, the Atari 2600 featured interchangeable cartridges, allowing players to switch between a variety of games, which was a groundbreaking concept at the time. It had a joystick controller and supported iconic titles such as \'Space Invaders\', \'Pac-Man\', \'Pitfall!\', and \'Adventure\'. The console\'s simple 8-bit graphics and sound, along with its accessibility, helped Atari become a household name. Its success laid the foundation for the modern video game industry.', 'Atari2600.jpg'),

//     ('Atari Lynx', 'The Atari Lynx, released in 1989, was the first handheld gaming console with a full-color display and backlighting, offering advanced graphics and capabilities for its time. It featured a unique ambidextrous design, allowing players to flip the device and switch between left- and right-handed controls. The Lynx also supported multiplayer gaming through a link cable, enabling up to eight players to connect their devices. Despite its technological innovations, including scaling and sprite manipulation for 3D-like effects, the Lynx struggled in the market due to competition from the Nintendo Game Boy, which had better battery life and a larger game library. Nonetheless, the Atari Lynx remains a significant part of gaming history for its early advancements in handheld gaming.', 'Atari-Lynx.jpg'),

//     ('Atari ST', 'The Atari ST, released in 1985, is a series of personal computers known for their 16/32-bit Motorola 68000 processor, high-resolution graphics, and stereo sound. Featuring a minimalist design with a built-in keyboard and floppy disk drive, the Atari ST became popular among gamers, graphic designers, and musicians. Its MIDI support made it a favorite in the music community, allowing easy connection to synthesizers. Notable games included \'Dungeon Master\' and \'Tempest 2000\'. The Atari ST series solidified Atari\'s presence in the personal computer market during the 1980s and early 1990s.', 'Atari-ST.jpg')
// ";

// if ($conn->query($AtariDevice) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }
//---------------GAMES-------------------

// Sony games
// $SonyGames = "INSERT INTO SonyGames (game_id, game_name, image_url) VALUES
//     (1, 'Resident Evil 2', 'ReE2.jpg'),
//     (1, 'Silent Hill', 'silent-hill.jpg'),
//     (1, 'Tekken 3', 'tekken3.jpg'),
//     (1, 'Crash', 'ReE2.jpg'),
//     (2, 'Fifa 14', 'fifa14.jpg'),
//     (2, 'Final Fantasy X', 'FFx.jpg'),
//     (2, 'Resident Evil 4', 'RE4.jpg'),
//     (2, 'Bully', 'bully.jpg'),
//     (3, 'Need For Speed', 'nfs.jpeg'),
//     (3, 'Mortal Kombat', 'MC.jpg'),
//     (3, 'assassin\'s creed', 'AS.jpg'),
//     (3, 'resistance', 'resistance.jpg')
// ";

// // Execute the query
// if ($conn->query($SonyGames) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }

// // Nintendo games
// $NintendoGames = "INSERT INTO NintendoGames (game_id,game_name, image_url) VALUES
//     (1,'The Legend of Zelda', 'LOZ.png'),
//     (1,'Super Mario World', 'SM.png'),
//     (1,'Donkey Kong Country', 'DK.png'),
//     (1,'Super Mario Kart', 'SMK.png'),
//     (2,'Super Mario 64', 'SM64.png'),
//     (2,'Mario Kart 64', 'MK64.png'),
//     (2,'GoldenEye 007', '007.png'),
//     (2,'The Legend of Zelda', 'ZT.png'),
//     (3,'Super Smash Bros', 'SSB.png'),
//     (3,'Mario Kart', 'MKGC.png'),
//     (3,'The Legend of Zelda', 'ZGC.png'),
//     (3,'Luigi\'s Mansion', 'LM.png')
// ";

// if ($conn->query($NintendoGames) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//   echo "Error: " . $conn->error;
// }

// // Atari games
// $AtariGames = "INSERT INTO AtariGames (game_id , game_name, image_url) VALUES
//     (1,'3-D Tic-Tac-Toe', 'Atari-tictactoe.jpg'),
//     (1,'Amidar', 'Atari-Amidar.jpg'),
//     (1,'alien', 'Atari-alien.jpg'),
//     (1,'Airlock', 'Atari-Airlock.jpg'),
//     (2,'Paperboy', 'Atari-Paperboy.png'),
//     (2,'Baseball Heroes', 'Atari-BaseballHeroes.jpg'),
//     (2,'Pac-Land', 'Atari-Pac-Land.png'),
//     (2,'Crystal Mines II', 'Atari-Crystal Mines-II.jpg'),
//     (3,'Dungeon Master', 'Atari-Dungeon_Master.jpg'),
//     (3,'Rick Dangerous', 'Atari-Rick-dangerous.jpg'),
//     (3,'Lemmings', 'Lemmings.jpg'),
//     (3,'Prince of Persia', 'Atari-Prince_of_Persia.jpg')
// ";

// if ($conn->query($AtariGames) === TRUE) {
//     echo "Values inserted successfully!";
// } else {
//   echo "Error: " . $conn->error;
// }





$conn->close();

?>
