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

$sql = "CREATE TABLE IF NOT EXISTS veterinarypet (
         sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         vet_name VARCHAR(50) NOT NULL,
         vet_contact VARCHAR(10) NOT NULL,
         pet_medications VARCHAR(300) NOT NULL,
         health_concerns VARCHAR(300) NOT NULL,
         preferred_time  time not null,
         preferred_date  date not null,
         register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
