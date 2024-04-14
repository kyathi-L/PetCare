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

$sql = "CREATE TABLE IF NOT EXISTS exoticpet (
         sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         owner_name VARCHAR(50) NOT NULL,
         owner_email VARCHAR(50) NOT NULL,
         owner_phone VARCHAR(10) NOT NULL,
         owner_address VARCHAR(50) NOT NULL,
         preferred_contact VARCHAR(20) NOT NULL,
         specific_requests VARCHAR(300) NOT NULL,
         pet_name VARCHAR(50) NOT NULL,
         species_breed VARCHAR(50) NOT NULL,
         pet_age INT NOT NULL,
         gender VARCHAR(50) NOT NULL,
         pet_weight DECIMAL(10,2) NOT NULL,
         enclouser_specs VARCHAR(30) NOT NULL,
         diet_instructions VARCHAR(300) NOT NULL,
         habitat_needs VARCHAR(300) NOT NULL,
         health_conditions VARCHAR(300) NOT NULL,
         care_requirements VARCHAR(300) NOT NULL,
         behavior_notes VARCHAR(300) NOT NULL,
         emergency_contact_name VARCHAR(50) NOT NULL,
         emergency_contact_phone VARCHAR(10) NOT NULL,
         vet_name VARCHAR(50) NOT NULL,
         vet_contact VARCHAR(50) NOT NULL,
         medications VARCHAR(300) NOT NULL,
         allergies VARCHAR(300) NOT NULL,
         additional_comments VARCHAR(300) NOT NULL,
         register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
