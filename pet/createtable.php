<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginuser";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry, failed to connect: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

$sql = "CREATE TABLE IF NOT EXISTS boardingpet (
         sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         owner_name VARCHAR(50) NOT NULL,
         owner_address VARCHAR(50) NOT NULL,
         owner_phone VARCHAR(10) NOT NULL,
         owner_email VARCHAR(50) NOT NULL,
         pet_name VARCHAR(50) NOT NULL,
         pet_species VARCHAR(50) NOT NULL,
         pet_breed VARCHAR(50) NOT NULL,
         pet_age INT NOT NULL,
         pet_gender VARCHAR(50) NOT NULL,
         pet_weight DECIMAL(10,2) NOT NULL,
         pet_color VARCHAR(50) NOT NULL,
         vaccination_date DATE NOT NULL,
         emergency_contact VARCHAR(10) NOT NULL,
         veterinary_info VARCHAR(250) NOT NULL,
         other_info VARCHAR(250) NOT NULL,
         register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
