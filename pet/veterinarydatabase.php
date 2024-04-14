<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $vet_name = $_POST["vet_name"];
    $vet_contact = $_POST["vet_contact"];
    $pet_medications = $_POST["pet_medications"];
    $health_concerns = $_POST["health_concerns"];
    $preferred_time = $_POST["preferred_time"];
    $preferred_date = $_POST["preferred_date"];
    
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "loginuser";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO veterinarypet (vet_name, vet_contact, pet_medications, health_concerns, preferred_time, preferred_date) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $vet_name, $vet_contact, $pet_medications, $health_concerns, $preferred_time, $preferred_date);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
    header("Location: veternary.html");

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Pet Boarding Registration Form</title>
<link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div id="formreg">
        <form action="" method="POST">
            <h2>Veterinary Registration Form</h2>

            <div class="input-group">
                <label for="vet_name">Veterinarian's Name:</label>
                <input type="text" id="vet_name" name="vet_name" required>
            </div>
            
            <div class="input-group">
                <label for="vet_contact">Contact Information:</label>
                <input type="text" id="vet_contact" name="vet_contact" required>
            </div>
            
            <div class="input-group">
                <label for="pet_medications">Current Medications:</label>
                <textarea id="pet_medications" name="pet_medications" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="health_concerns">Health Concerns:</label>
                <textarea id="health_concerns" name="health_concerns" rows="4"></textarea>
            </div>

            <div class="input-group">
                <label for="preferred_time">Preferred time:</label>
                <input type="time" id="preferred_time" name="preferred_time" required>
            </div>
            
            <div class="input-group">
                <label for="preferred_date">Preferred Date:</label>
                <input type="date" id="preferred_date" name="preferred_date" required>
            </div>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
