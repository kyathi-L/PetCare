<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $owner_name = $_POST["owner_name"];
    $owner_email = $_POST["owner_email"];
    $owner_phone = $_POST["owner_phone"];
    $owner_address = $_POST["owner_address"];
    $contact_method = $_POST["contact_method"];
    $instructions = $_POST["instructions"];
    $pet_name = $_POST["pet_name"];
    $pet_species = $_POST["pet_species"];
    $pet_age = $_POST["pet_age"];
    $pet_gender = $_POST["pet_gender"];
    $pet_weight = $_POST["pet_weight"];
    $massage_type = $_POST["massage_type"];
    $medical_conditions = $_POST["medical_conditions"];
    $allergies = $_POST["allergies"];
    $concern_areas = $_POST["concern_areas"];
    //Database connection parameters
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
    
    // Prepare SQL statement

    $sql = "INSERT INTO massagegpet (owner_name, owner_email, owner_phone, owner_address, contact_method, instructions, pet_name, pet_species, pet_age, pet_gender, pet_weight, massage_type, medical_conditions, allergies, concern_areas) VALUES ('" . mysqli_real_escape_string($conn, $owner_name) . "', '" . mysqli_real_escape_string($conn, $owner_email) . "', '" . mysqli_real_escape_string($conn, $owner_phone) . "', '" . mysqli_real_escape_string($conn, $owner_address) . "', '" . mysqli_real_escape_string($conn, $contact_method) . "', '" . mysqli_real_escape_string($conn, $instructions) . "', '" . mysqli_real_escape_string($conn, $pet_name) . "', '" . mysqli_real_escape_string($conn, $pet_species) . "', '" . mysqli_real_escape_string($conn, $pet_age) . "', '" . mysqli_real_escape_string($conn, $pet_gender) . "', '" . mysqli_real_escape_string($conn, $pet_weight) . "', '" . mysqli_real_escape_string($conn, $massage_type) . "', '" . mysqli_real_escape_string($conn, $medical_conditions) . "', '" . mysqli_real_escape_string($conn, $allergies) . "', '" . mysqli_real_escape_string($conn, $concern_areas) . "')";

    // Debugging: Print the SQL query
    // echo "SQL Query: " . $sql . "<br>";
    
    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    // if ($result) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
    header("Location: massage.html");

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Massage Registration Form</title>
<link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div id="formreg">
        <form action="" method="POST">
            <h2>Pet Massage Registration Form</h2>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_name">Owner's Name:</label>
                    <input type="text" id="owner_name" name="owner_name" required>
                </div>
                <div class="input-row">
                    <label for="owner_email">Owner's Email Address:</label>
                    <input type="email" id="owner_email" name="owner_email" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_phone">Owner's Phone Number:</label>
                    <input type="tel" id="owner_phone" name="owner_phone" required>
                </div>
                <div class="input-row">
                    <label for="owner_address">Owner's Address:</label>
                    <input type="text" id="owner_address" name="owner_address" required>
                </div>
            </div>

            <div class="input-group">
                    <label for="contact_method">Preferred method of contact:</label>
                    <select id="contact_method" name="contact_method" required>
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
                    </select>
            </div>
            
            <div class="input-group">
                <label for="instructions">Specific requests or instructions for the massage therapist:</label>
                <textarea id="instructions" name="instructions" rows="4" required></textarea>
            </div>

            <h3>Pet Information</h3>

            <div class="input-group">
                <div class="input-row">
                    <label for="pet_name">Pet's Name:</label>
                    <input type="text" id="pet_name" name="pet_name" required>
                </div>
                <div class="input-row">
                    <label for="pet_species">Species/Breed:</label>
                    <input type="text" id="pet_species" name="pet_species" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_age">Age:</label>
                    <input type="number" id="pet_age" name="pet_age" required>
                </div>
                <div class="input-row">
                    <label for="pet_gender">Gender:</label>
                    <input type="text" id="pet_gender" name="pet_gender" required>
                </div>
            </div>
            
            <div class="input-group">
                <label for="pet_weight">Weight:</label>
                <input type="number" id="pet_weight" name="pet_weight" required>
            </div>

            <div class="input-group">
                <label for="massage_type">Choose the type of Massage:</label>
                <select id="massage_type" name="massage_type" required>
                    <option>Swedish Massage</option>
                    <option>Shiatsu</option>
                    <option>Myotherapy</option>
                    <option>sports massage</option>
                </select>
            </div>
            <div class="input-group">
                <label for="medical_conditions">Any medical conditions or health concerns:</label>
                <textarea id="medical_conditions" name="medical_conditions" rows="4" required></textarea>
            </div>

            <div class="input-group">
                    <label for="allergies">Any allergies or sensitivities:</label>
                    <textarea id="allergies" name="allergies" rows="4" required></textarea>
            </div>
            <div class="input-group">
                <label for="concern_areas">Any specific areas of concern or issues to address <br> during the massage session:</label>
                <textarea id="concern_areas" name="concern_areas" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
        <div id="errorMessages"></div>
    </div>
           
    <script src="form.js"></script>
</body>
</html>
