<?php
$hostname = 'db';
$username = 'root';
$password = 'root';
$database = 'doctor_appointment';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the shema of the database
$sqlFile = file_get_contents('init.sql');

// Execute SQL
if ($conn->multi_query($sqlFile)) {
    error_log("SCHEMA CREATED SUCCESSFULLY");
} else {
    error_log("ERROR CREATING SCHEMA: " . $conn->error);
}

$conn->close();
?>