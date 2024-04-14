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

$sql = "CREATE TABLE IF NOT EXISTS massagegpet (
         sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         owner_name VARCHAR(50) NOT NULL,
         owner_email VARCHAR(50) NOT NULL,
         owner_phone VARCHAR(10) NOT NULL,
         owner_address VARCHAR(50) NOT NULL,
         contact_method VARCHAR(30) NOT NULL,
         instructions VARCHAR(300) NOT NULL,
         pet_name VARCHAR(50) NOT NULL,
         pet_species VARCHAR(50) NOT NULL,
         pet_age INT NOT NULL,
         pet_gender VARCHAR(50) NOT NULL,
         pet_weight DECIMAL(10,2) NOT NULL,
         massage_type VARCHAR(30) NOT NULL,
         medical_conditions VARCHAR(300) NOT NULL,
         allergies VARCHAR(250) NOT NULL,
         concern_areas VARCHAR(300) not null,
         register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
