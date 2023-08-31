<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "./utils/dbUtil.php";

    $appointmentID = $_POST['appointment_id'];
    $appointmentDate = $_POST["appointment_date"];
    $appointmentTime = $_POST["appointment_time"];
    $status = $_POST['status'];

    $database = new DatabaseUtility();

    $updateStatusQuery = "UPDATE appointments SET Status = '$status' WHERE AppointmentID = $appointmentID";
    $updateStatusResult = $database->conn->query($updateStatusQuery);

    if ($updateStatusResult) {
        echo "Appointment status updated successfully.";
    } else {
        echo "Error updating appointment status: " . $database->conn->error;
    }

    $updateDateTimeQuery = "UPDATE appointments SET AppointmentDate = '$appointmentDate', AppointmentTime = '$appointmentTime' WHERE AppointmentID = $appointmentID";
    $updateDateTimeResult = $database->conn->query($updateDateTimeQuery);

    if ($updateDateTimeResult) {
        echo "Appointment date and time updated successfully.";
    } else {
        echo "Error updating appointment date and time: " . $database->conn->error;
    }


    $response = ["message" => "Appointment added successfully"];
    echo json_encode($response);
    $database->closeConnection();
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>