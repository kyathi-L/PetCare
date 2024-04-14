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

$sql = "CREATE TABLE IF NOT EXISTS groomingpet (
         sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         owner_name VARCHAR(50) NOT NULL,
         owner_address VARCHAR(50) NOT NULL,
         owner_phone VARCHAR(10) NOT NULL,
         owner_email VARCHAR(50) NOT NULL,
         pet_name VARCHAR(50) NOT NULL,
         pet_species VARCHAR(50) NOT NULL,
         pet_age INT NOT NULL,
         pet_gender VARCHAR(50) NOT NULL,
         pet_weight DECIMAL(10,2) NOT NULL,
         pet_color VARCHAR(50) NOT NULL,
         medical_conditions VARCHAR(300) NOT NULL,
         grooming_services Varchar(30) NOT NULL,
         preferred_date  date not null,
         preferred_time  time not null,
         special_requests varchar(300) not null,
         emergency_contact_name varchar(300)not null,
         emergency_contact_phone varchar(10) not null,
         vet_info_name varchar(50) not null,
         vet_info_number varchar(10) not null,
         additional_info varchar(300) not null,
         register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
