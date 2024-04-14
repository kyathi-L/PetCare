<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $owner_name = $_POST["owner_name"];
    $owner_address = $_POST["owner_address"];
    $owner_phone = $_POST["owner_phone"];
    $owner_email = $_POST["owner_email"];
    $pet_name = $_POST["pet_name"];
    $pet_species = $_POST["pet_species"];
    $pet_breed = $_POST["pet_breed"];
    $pet_age = $_POST["pet_age"];
    $pet_gender = $_POST["pet_gender"];
    $pet_weight = $_POST["pet_weight"];
    $pet_color = $_POST["pet_color"];
    $vaccination_date = $_POST["vaccination_date"];
    $emergency_contact = $_POST["emergency_contact"];
    $veterinary_info = $_POST["veterinary_info"];
    $other_info = $_POST["other_info"];
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
    $sql = "INSERT INTO boardingpet (owner_name, owner_address, owner_phone, owner_email, pet_name, pet_species, pet_breed, pet_age, pet_gender, pet_weight, pet_color, vaccination_date, emergency_contact, veterinary_info, other_info) VALUES ('$owner_name', '$owner_address', '$owner_phone', '$owner_email', '$pet_name', '$pet_species', '$pet_breed', '$pet_age', '$pet_gender', '$pet_weight', '$pet_color', '$vaccination_date', '$emergency_contact', '$veterinary_info', '$other_info')";

    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    // if ($result) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
    header("Location: petboarding.html");

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
    <div  id="formreg" >
        <form method="POST">
            <h2>Pet Boarding Registration Form</h2>
            
            <h3>Owner Information</h3>
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_name">Owner's Name:</label>
                    <input type="text" id="owner_name" name="owner_name" required>
                </div>
                <div class="input-row">
                    <label for="owner_address">Owner's Address:</label>
                    <input type="text" id="owner_address" name="owner_address" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="owner_phone">Owner's Phone:</label>
                    <input type="tel" id="owner_phone" name="owner_phone" required>
                </div>
                <div class="input-row">
                    <label for="owner_email">Owner's Email:</label>
                    <input type="email" id="owner_email" name="owner_email" required>
                </div>
            </div>
            
            <h3>Pet Information</h3>
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_name">Pet's Name:</label>
                    <input type="text" id="pet_name" name="pet_name" required>
                </div>
                <div class="input-row">
                    <label for="pet_species">Species:</label>
                    <input type="text" id="pet_species" name="pet_species" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_breed">Breed:</label>
                    <input type="text" id="pet_breed" name="pet_breed" required>
                </div>
                <div class="input-row">
                    <label for="pet_age">Age:</label>
                    <input type="number" id="pet_age" name="pet_age" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_gender">Gender:</label>
                    <input type="text" id="pet_gender" name="pet_gender" required>
                </div>
                <div class="input-row">
                    <label for="pet_weight">Weight:</label>
                    <input type="number" id="pet_weight" name="pet_weight" required>
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_color">Color/Markings:</label>
                    <input type="text" id="pet_color" name="pet_color" required>
                </div>
                <div class="input-row">
                    <label for="vaccination_date">Date of Last Vaccination:</label>
                    <input type="date" id="vaccination_date" name="vaccination_date" required>
                </div>
            </div>

            <h3>Contact and Other Information</h3>
            
            <div class="input-group">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" id="emergency_contact" name="emergency_contact" required>
            </div>
            
            <div class="input-group">
                <label for="veterinary_info">Veterinary Information:</label>
                <textarea id="veterinary_info" name="veterinary_info" rows="4"  required> </textarea>
            </div>
            
            <div class="input-group">
                <label for="other_info">Other Information:</label>
                <textarea id="other_info" name="other_info" rows="4" required></textarea>
            </div>
            <input type="submit" value="Submit" id=submit style="background-color:#4CAF50; color:white;" onclick="window.location.href='petboarding.html'"></a>
            <!-- <a href="petboarding.html"><button type="button" value="Submit">Submit</button></a> -->
        </form>
        <div id="errorMessages"></div>
    </div>
           
<script src="form.js"></script>
</body>
</html>
