<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from the form
    $email = $_POST["email"];

    // Check if the email exists in the database
    $servername = "localhost";
    $username = "root"; // Update with your database username
    $password = ""; // Update with your database password
    $database = "loginuser";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM credentials WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Email found in the database
        $_SESSION['reset_email'] = $email; // Store email in session for later use
        header("Location: resetpassword.html"); // Redirect to password reset page
        exit;
    } else {
        // Email not found in the database
        echo "Email not found in the database";
    }

    mysqli_close($conn);
}
?>

