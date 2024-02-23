<?php
// Function to establish a connection to the MySQL database
function connectToDatabase() {
    $servername = "your_db_server";
    $username = "your_db_username";
    $password = "your_db_password";
    $dbname = "your_db_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to check visa status based on passport number
function checkVisaStatus($conn, $passportNumber) {
    $sql = "SELECT visa_status FROM visa_screening WHERE passport_number = '$passportNumber'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["visa_status"];
    } else {
        return "Passport number not found";
    }
}

// Main logic starts here

// Establish a connection to the database
$conn = connectToDatabase();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passportNumber = $_POST["passport_number"];

    // Check visa status based on passport number
    $visaStatus = checkVisaStatus($conn, $passportNumber);

    // Send visa status as a response
    echo $visaStatus;
}

// Close the database connection
$conn->close();
?>
