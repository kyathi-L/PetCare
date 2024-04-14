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
    $preferred_contact = $_POST["preferred_contact"];
    $specific_requests = $_POST["specific_requests"];
    $pet_name = $_POST["pet_name"];
    $species_breed = $_POST["species_breed"];
    $pet_age = $_POST["pet_age"];
    $gender = $_POST["gender"];
    $pet_weight = $_POST["pet_weight"];
    $enclouser_specs = $_POST["enclouser_specs"];
    $diet_instructions = $_POST["diet_instructions"];
    $habitat_needs = $_POST["habitat_needs"];
    $health_conditions = $_POST["health_conditions"];
    $care_requirements = $_POST["care_requirements"];
    $behavior_notes = $_POST["behavior_notes"];
    $emergency_contact_name = $_POST["emergency_contact_name"];
    $emergency_contact_phone = $_POST["emergency_contact_phone"];
    $vet_name = $_POST["vet_name"];
    $vet_contact = $_POST["vet_contact"];
    $medications = $_POST["medications"];
    $allergies = $_POST["allergies"];
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
    // Change the variable name from $species_breed to $pet_breed

   // Prepare SQL statement with properly escaped values
$sql = "INSERT INTO exoticpet (owner_name, owner_email, owner_phone, owner_address, preferred_contact, specific_requests, pet_name, species_breed, pet_age, gender, pet_weight, enclouser_specs, diet_instructions, habitat_needs, health_conditions, care_requirements, behavior_notes, emergency_contact_name, emergency_contact_phone, vet_name, vet_contact, medications, allergies, additional_comments) VALUES ('" . mysqli_real_escape_string($conn, $owner_name) . "', '" . mysqli_real_escape_string($conn, $owner_email) . "', '" . mysqli_real_escape_string($conn, $owner_phone) . "', '" . mysqli_real_escape_string($conn, $owner_address) . "', '" . mysqli_real_escape_string($conn, $preferred_contact) . "', '" . mysqli_real_escape_string($conn, $specific_requests) . "', '" . mysqli_real_escape_string($conn, $pet_name) . "', '" . mysqli_real_escape_string($conn, $species_breed) . "', '" . mysqli_real_escape_string($conn, $pet_age) . "', '" . mysqli_real_escape_string($conn, $gender) . "', '" . mysqli_real_escape_string($conn, $pet_weight) . "', '" . mysqli_real_escape_string($conn, $enclouser_specs) . "', '" . mysqli_real_escape_string($conn, $diet_instructions) . "', '" . mysqli_real_escape_string($conn, $habitat_needs) . "', '" . mysqli_real_escape_string($conn, $health_conditions) . "', '" . mysqli_real_escape_string($conn, $care_requirements) . "', '" . mysqli_real_escape_string($conn, $behavior_notes) . "', '" . mysqli_real_escape_string($conn, $emergency_contact_name) . "', '" . mysqli_real_escape_string($conn, $emergency_contact_phone) . "', '" . mysqli_real_escape_string($conn, $vet_name) . "', '" . mysqli_real_escape_string($conn, $vet_contact) . "', '" . mysqli_real_escape_string($conn, $medications) . "', '" . mysqli_real_escape_string($conn, $allergies) . "', '" . mysqli_real_escape_string($conn, $additional_comments) . "')";


    // Execute query
    $result = mysqli_query($conn, $sql);

    // Check if query executed successfully
    if ($result) {
        echo"success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    header("Location: exoticpets.html");

    // Close connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exotic Pets Specialized Care Registration Form</title>
<link rel="stylesheet" href="styleform.css">
</head>
<body>
    <div id="formreg">
        <form action="" method="POST">
            <h2>Exotic Pets Specialized Care Registration</h2>
            
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
                <label for="preferred_contact">Preferred Method of Contact:</label>
                <select id="preferred_contact" name="preferred_contact">
                    <option value="email">Email</option>
                    <option value="phone">Phone</option>
                </select>
            </div>
            
            <div class="input-group">
                <label for="specific_requests">Specific Requests or Instructions for the Care Provider:</label>
                <textarea id="specific_requests" name="specific_requests" rows="4"></textarea>
            </div>
            
            <h3>Pet's Information</h3>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_name">Pet's Name:</label>
                    <input type="text" id="pet_name" name="pet_name" required>
                </div>
                <div class="input-row">
                    <label for="species_breed">Species/Breed:</label>
                    <input type="text" id="species_breed" name="species_breed">
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_age">Age:</label>
                    <input type="number" id="pet_age" name="pet_age" required>
                </div>
                <div class="input-row">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender">
                </div>
            </div>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="pet_weight">Weight:</label>
                    <input type="number" id="pet_weight" name="pet_weight">
                </div>
                <div class="input-row">
                    <label for="enclosure_specs">Enclosure/Tank Specifications:</label>
                    <input type="text" id="enclouser_specs" name="enclouser_specs">
                </div>
            </div>
            
            <div class="input-group">
                <label for="diet_instructions">Diet and Feeding Instructions:</label>
                <textarea id="diet_instructions" name="diet_instructions" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="habitat_needs">Habitat/Environmental Needs:</label>
                <textarea id="habitat_needs" name="habitat_needs" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="health_conditions">Health Concerns or Medical Conditions:</label>
                <textarea id="health_conditions" name="health_conditions" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="care_requirements">Specific Care Requirements or Handling Instructions:</label>
                <textarea id="care_requirements" name="care_requirements" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="behavior_notes">Behavior or Temperament Notes:</label>
                <textarea id="behavior_notes" name="behavior_notes" rows="4"></textarea>
            </div>
            
            <h3>Emergency Contact</h3>
            
            <div class="input-group">
                <div class="input-row">
                    <label for="emergency_contact_name">Emergency Contact Name:</label>
                    <input type="text" id="emergency_contact_name" name="emergency_contact_name" required>
                </div>
                <div class="input-row">
                    <label for="emergency_contact_phone">Emergency Contact Phone Number:</label>
                    <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" required>
                </div>
            </div>
            
            <h3>Veterinary Information</h3>
            
            <div class="input-group">
                <label for="vet_name">Veterinarian's Name:</label>
                <input type="text" id="vet_name" name="vet_name">
            </div>
            
            <div class="input-group">
                <label for="vet_contact">Veterinarian's Contact Information:</label>
                <input type="text" id="vet_contact" name="vet_contact">
            </div>
            
            <h3>Additional Information</h3>
            
            <div class="input-group">
                <label for="medications">Medications or Supplements:</label>
                <textarea id="medications" name="medications" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="allergies">Any Allergies or Sensitivities:</label>
                <textarea id="allergies" name="allergies" rows="4"></textarea>
            </div>
            
            <div class="input-group">
                <label for="additional_comments">Additional Comments or Special Requests:</label>
                <textarea id="additional_comments" name="additional_comments" rows="4"></textarea>
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
