<?php

$email = $_POST['email'];
$pass = $_POST['password'];
$pass = $_POST["password_confirmation"];

if (empty($email)) {
    header("Location: SignUp.php?error=Email is required");
    exit();
} else if (empty($pass)) {
    header("Location: SignUp.php?error=Password is required");
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: SignUp.php?error=Email is not valid");
    exit();
} elseif (strlen($pass) < 8 || !preg_match("/[A-Z]/", $pass) || !preg_match("/[a-z]/", $pass) || !preg_match("/[0-9]/", $pass) || !preg_match("/[\W]/", $pass)) {
    header("Location: SignUp.php?error=Password must be at least 8 characters, contain one uppercase letter, one lowercase letter, one number, and one special character");
    exit();
} elseif($_POST["password"] !== $_POST["password_confirmation"]){
    header("Location: SignUp.php?error=Passwords do not match");        
    exit(); 
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Retro_devices";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $checkEmailSql = "SELECT * FROM Users WHERE User_email = ?";
    $checkStmt = $conn->prepare($checkEmailSql);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // User already exists
        header("Location: Login.php?error=You already have an account. Please log in.");
        exit();
    }
    $checkStmt->close();

    // Insert new user
    $sql = "INSERT INTO Users (User_email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $pass);
    
    if ($stmt->execute()) {
        header("Location: Login.php?success=Account created successfully. Please log in.");
        exit();
    } else {
        die("Database error: " . $conn->error);
    }

    $stmt->close();
    $conn->close();
}
?>
