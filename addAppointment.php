<?php
include_once "./models/patient.php";
include_once "./utils/dbUtil.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $birthDate = $_POST["birthDate"];
    $doctor = $_POST["doctor"];
    $service = $_POST["service"];
    $appointmentDate = $_POST["appointment_date"];
    $appointmentTime = $_POST["appointment_time"];
    $specialRequirements = $_POST["special_requirements"];
    $status = "booked";

    // Prepare patient data
    $patientData = [
        'firstname' => $firstName,
        'lastname' => $lastName,
        'telephone' => $telephone,
        'email' => $email,
        'doctor' => $doctor,
        'birthdate' => $birthDate,
    ];



    // Insert patient data into the database
    $database = new DatabaseUtility();
    $patientID = $database->insertData("patients", $patientData);

    // Prepare appointment data
    $appointmentData = [
        'PatientID' => $patientID,
        'PatientName' => $firstName . ' ' . $lastName,
        'PatientTelephone' => $telephone,
        'DoctorID' => $doctor,
        'AppointmentDate' => $appointmentDate,
        'AppointmentTime' => $appointmentTime,
        'Status' => $status,
        'Notes' => $specialRequirements,
    ];

    if (!$patientID) {
        http_response_code(404);
        echo json_encode(["error" => "Error inserting patient data"]);
        exit();
    }
    // Assign the patient ID to the appointment data
    $appointmentData['PatientID'] = $patientID;

    // Insert appointment data into the database
    $appointmentID = $database->insertData("appointments", $appointmentData);

    if (!$appointmentID) {
        http_response_code(500);
        echo json_encode(["error" => "Error inserting appointment data"]);
        exit();
    }

    $database->closeConnection();

    // Prepare a response
    $response = ["message" => "Appointment added successfully"];
    echo json_encode($response);
} else {
    // Handle other types of requests or invalid requests
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Invalid request"]);
}
?>