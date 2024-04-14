<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $owner_name = $_POST["owner_name"];
    $owner_address = $_POST["owner_address"];
    $owner_phone = $_POST["owner_phone"];
    $owner_email = $_POST["owner_email"];
    $pet_name = $_POST["pet_name"];
    $pet_species = $_POST["pet_species"];
    $pet_age = $_POST["pet_age"];
    $pet_gender = $_POST["pet_gender"];
    $pet_weight = $_POST["pet_weight"];
    $pet_color = $_POST["pet_color"];
    $medical_conditions = $_POST["medical_conditions"];
    $grooming_services = $_POST["grooming_services"];
    $preferred_date = $_POST["preferred_date"];
    $preferred_time = $_POST["preferred_time"];
    $special_requests = $_POST["special_requests"];
    $emergency_contact_name = $_POST["emergency_contact_name"];
    $emergency_contact_phone = $_POST["emergency_contact_phone"];
    $vet_info_name = $_POST["vet_info_name"];
    $vet_info_number = $_POST["vet_info_number"];
    $additional_info = $_POST["additional_info"];
    
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
    $sql = "INSERT INTO groomingpet (owner_name, owner_address, owner_phone, owner_email, pet_name, pet_species, pet_age, pet_gender, pet_weight, pet_color, medical_conditions, grooming_services, preferred_date, preferred_time, special_requests, emergency_contact_name, emergency_contact_phone, vet_info_name, vet_info_number, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssisssssssssssss", $owner_name, $owner_address, $owner_phone, $owner_email, $pet_name, $pet_species, $pet_age, $pet_gender, $pet_weight, $pet_color, $medical_conditions, $grooming_services, $preferred_date, $preferred_time, $special_requests, $emergency_contact_name, $emergency_contact_phone, $vet_info_name, $vet_info_number, $additional_info);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
    header("Location: petgrooming.html");

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Grooming Registration Form</title>
<link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div id="formreg">
        <form action="" method="POST">
            <h2>Pet Grooming Registration Form</h2><br>
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
                <div class="input-row">
                    <label for="pet_weight">Weight:</label>
                    <input type="number" id="pet_weight" name="pet_weight" required>
                </div>
                <div class="input-row">
                    <label for="pet_color">Color/Markings:</label>
                    <input type="text" id="pet_color" name="pet_color" required>
                </div>
            </div>
            <h3>Contact and Other Information</h3>
            <div class="input-group">
                <label for="medical_conditions">Medical Conditions/Special Needs:</label>
                <textarea id="medical_conditions" name="medical_conditions" rows="4" required></textarea>
            </div>
            
            <div class="input-group">
                <label for="grooming_services">Desired Grooming Services:</label>
                <select id="grooming_services" name="grooming_services" required>
                    <option value="Bath">Bath</option>
                    <option>Brushing</option>
                    <option value="Haircut">Haircut</option>
                    <option value="Nail Trim">Nail Trim</option>
                    <option>Ear and Oral Care</option>
                    <option>Paw Pad Care</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="preferred_date">Preferred Grooming Date:</label>
                    <input type="date" id="preferred_date" name="preferred_date" required>
                </div>
                <div class="input-row">
                    <label for="preferred_time">Preferred Grooming Time:</label>
                    <input type="time" id="preferred_time" name="preferred_time" required>
                </div>
            </div>
            
            <div class="input-group">
                <label for="special_requests">Special Requests for the Groomer:</label>
                <textarea id="special_requests" name="special_requests" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="emergency_contact_name">Emergency Contact Name:</label>
                <input type="text" id="emergency_contact_name" name="emergency_contact_name" required>
            </div>
            
            <div class="input-group">
                <label for="emergency_contact_phone">Emergency Contact Phone:</label>
                <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" required>
            </div>
            
            <h3>Veterinarian Information</h3>
            <div class="input-group">
                <label for="vet_info_name">Name of Pet's Veterinarian:</label>
                <input type="text" id="vet_info_name" name="vet_info_name" required>
            </div>
            <div class="input-group">
              <label for="vet_info_number">Contact Information of Pet's Veterinarian:</label>
              <input type="tel" name="vet_info_number" id="vet_info_number" required>
            </div>
            
            <div class="input-group">
                <label for="additional_info">Additional Information:</label>
                <textarea id="additional_info" name="additional_info" rows="4"></textarea>
            </div>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
