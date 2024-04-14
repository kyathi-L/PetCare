<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $owner_name = $_POST["owner_name"];
    $owner_email = $_POST["owner_email"];
    $owner_phone = $_POST["owner_phone"];
    $owner_address = $_POST["owner_address"];
    $pet_name = $_POST["pet_name"];
    $pet_species = $_POST["pet_species"];
    $pet_age = $_POST["pet_age"];
    $pet_gender = $_POST["pet_gender"];
    $pet_color = $_POST["pet_color"];
    $pet_allergies = $_POST["pet_allergies"];
    $pet_instructions = $_POST["pet_instructions"];
    $des_location = $_POST["des_location"];
    $session_date = $_POST["session_date"];
    $session_time = $_POST["session_time"];
    $specific_poses = $_POST["specific_poses"];
    $props = $_POST["props"];
    $additional_comments = $_POST["additional_comments"];
    
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
    $sql = "INSERT INTO photographypet (owner_name, owner_email, owner_phone, owner_address, pet_name, pet_species, pet_age, pet_gender, pet_color, pet_allergies, pet_instructions, des_location, session_date, session_time, specific_poses, props, additional_comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssissssssssss", $owner_name, $owner_email, $owner_phone, $owner_address, $pet_name, $pet_species, $pet_age, $pet_gender, $pet_color, $pet_allergies, $pet_instructions, $des_location, $session_date, $session_time, $specific_poses, $props, $additional_comments);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
    header("Location: photography.html");

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Photography Registration Form</title>
<link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div id="formreg">
        <form action="" method="POST">
            <h2>Pet Photography Registration Form</h2>
            <h3>Owner Information</h3>
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_name">Owner's Name:</label>
                    <input type="text" id="owner_name" name="owner_name" required><br><br>
                </div>

                <div class="input-row">
                    <label for="owner_email">Owner's Email Address:</label>
                    <input type="email" id="owner_email" name="owner_email" required><br><br>
                </div>
            </div>
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_phone">Owner's Phone Number:</label>
                    <input type="tel" id="owner_phone" name="owner_phone" required><br><br>
                </div>

                <div class="input-row">
                    <label for="owner_address">Owner's Address:</label>
                    <input type="text" id="owner_address" name="owner_address" required><br><br>
                </div>
            </div>

            <div class="input-group">
                <label for="contact_method">Preferred method of contact:</label>
                <select id="contact_method" name="contact_method">
                    <option value="email">Email</option>
                    <option value="phone">Phone</option>
                </select>
            </div>

            <div class="input-group">
                <label for="specific_requests">Specific requests or instructions for the photographer:</label>
                <textarea id="specific_requests" name="specific_requests" rows="4"></textarea><br><br>
            </div>
            
            <h3>Pet Information</h3>
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_name">Pet's Name:</label>
                    <input type="text" id="pet_name" name="pet_name" required><br><br>
                </div>

                <div class="input-row">
                    <label for="pet_species">Species/Breed:</label>
                    <input type="text" id="pet_species" name="pet_species" required><br><br>
                </div>
            </div>

            <div class="input-group">
                <div class="input-row">
                    <label for="pet_age">Age:</label>
                    <input type="number" id="pet_age" name="pet_age" required><br><br>
                </div>
                <div class="input-row">
                    <label for="pet_gender">Gender:</label>
                    <input type="text" id="pet_gender" name="pet_gender" required><br><br>
                </div>
            </div>

            <div class="input-group">
                <label for="pet_color">Color/Markings:</label>
                <input type="text" id="pet_color" name="pet_color" required><br><br>
            </div>

            <div class="input-group">
                <label for="pet_allergies">Any allergies or sensitivities:</label>
                <textarea id="pet_allergies" name="pet_allergies" rows="4"></textarea><br><br>
            </div>

            <h3>Photoshoot Information</h3><br>

            <div class="input-group">
                <label for="pet_instructions">Any special instructions for handling the pet during the photo session:</label>
                <textarea id="pet_instructions" name="pet_instructions" rows="4"></textarea><br><br>
            </div>

            <div class="input-group">
                <div class="input-row">
                    <label for="location">Desired location for the photo shoot:</label>
                    <input type="text" id="location" name="des_location" required><br><br>
                </div>

                <div class="input-row">
                    <label for="session_date">Preferred date for the session:</label>
                    <input type="date" id="session_date" name="session_date" required><br><br>
                </div>
            </div>

            <div class="input-group">
                    <label for="session_time">Preferred time for the session:</label>
                    <input type="time" id="session_time" name="session_time" required><br><br>
            </div>

            <div class="input-group">
                <label for="specific_poses">Specific poses or shots requested:</label>
                <textarea id="specific_poses" name="specific_poses" rows="4"></textarea><br><br>
            </div>

            <div class="input-group">
                <label for="props">Any props or accessories to be included in the photos:</label>
                <textarea id="props" name="props" rows="4"></textarea><br><br>
            </div>

            <div class="input-group">
                <label for="additional_comments">Any additional comments or special requests:</label>
                <textarea id="additional_comments" name="additional_comments" rows="4"></textarea><br><br>
            </div>

            <input type="submit" value="Submit">
        </form>
        <div id="errorMessages"></div>
    </div>
</body>
</html>
