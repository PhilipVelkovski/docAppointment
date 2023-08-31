<?php
include_once 'templates/header.php';
include_once "./utils/dbUtil.php";

$database = new DatabaseUtility();
$appointments = $database->getAppointments();

foreach ($appointments as $appointment) {
    echo "<div class='appointment'>";
    echo "<p>Patient: " . htmlspecialchars($appointment['PatientName']) . "</p>";
    echo "<p>Status:
            <form id='bookedForm'>
            <select name='status'>
                    <option value='booked' " . ($appointment['Status'] === 'booked' ? 'selected' : '') . ">Booked</option>
                    <option value='confirmed' " . ($appointment['Status'] === 'confirmed' ? 'selected' : '') . ">Confirmed</option>
                    <option value='canceled' " . ($appointment['Status'] === 'canceled' ? 'selected' : '') . ">Canceled</option>
                </select>
                <input type='hidden' name='appointment_id' value='{$appointment['AppointmentID']}' />

                <p>Date and Time:</p>
                <p>Appointment Date: <input type='date' name='appointment_date' value='{$appointment['AppointmentDate']}' /></p>
                <p>Appointment Time: <input type='time' name='appointment_time' value='{$appointment['AppointmentTime']}' /></p>

                <p>Notes:</p>
                <textarea name='notes'>" . htmlspecialchars($appointment['Notes']) . "</textarea>

                <button type='submit'>Update</button>
            </form>
           
        </p> <div id='successMessage'></div>";
    echo "</div>";
}

$database->closeConnection();
include_once 'templates/footer.php';
?>