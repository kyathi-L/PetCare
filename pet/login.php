<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform login verification here
    // Example: Check if the entered credentials exist in the database
    // Replace this with your actual database query

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "loginuser";

    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    if (!$conn) {
        die("Sorry we failed to connect: " . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM registrations WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            $response = array("success" => true);

            // Redirect to home.php
            header("Location: petcareServices.html");
            exit;
        } else {
            // Invalid username or password
            $response = array("success" => false, "message" => "Invalid username or password");

            // Redirect back to login page
            header("Location: index.html");
            exit;
        }
    }
}
?>
