<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from session
    $email = $_SESSION['reset_email'];

    // Get new password from form
    $new_password = $_POST["password"];

    // Update password in the database
    $servername = "localhost";
    $username = "root"; // Update with your database username
    $password = ""; // Update with your database password
    $database = "loginuser";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query
    $sql = "UPDATE credentials SET password = '$new_password' WHERE email = '$email'";
    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
