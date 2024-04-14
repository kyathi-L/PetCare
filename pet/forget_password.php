<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginuser";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email address from the form
    $email = $_POST["email"];

    // Generate a unique token (optional)
    $token = bin2hex(random_bytes(32)); // Generate a 32-character random token

    // Update password in the database
    $sql = "UPDATE credentials SET password_reset_token='$token' WHERE email='$email'";
    if ($conn->query($sql) === true) {
        // Password reset successful
        echo "Password reset link sent to your email.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection (if opened)
    $conn->close();
}
?>

