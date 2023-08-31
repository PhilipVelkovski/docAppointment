<?php
include_once 'templates/header.php';
?>

<h2>Book an Appointment</h2>
<div class="book-appointment">
    <form id="bookAppointmentForm">
        <input type="text" id="firstname" name="firstname" placeholder="Fistname"> <br>
        <input type="text" id="lastname" name="lastname" placeholder="Lastname"> <br>
        <input type="email" name="email" id="email" placeholder="Email Adress"> <br>
        <input type="tell" name="telephone" id="telephone"> <br>
        <label for="birthDate">Birth Date:</label>
        <input type="date" id="birthDate" name="birthDate" required> <br>

        <label for="doctor">Doctor:</label>
        <select name="doctor" id="doctor">
            <option value="2">Doctor 1</option>
            <option value="2">Doctor 2</option>
            <option value="3">Doctor 3</option>
            <option value="4">Doctor 4</option>
        </select><br>

        <label for="service">Service:</label>
        <select name="service" id="service">
            <option value="1">Service 1</option>
            <option value="2">Service 2</option>
            <option value="3">Service 3</option>
            <option value="4">Service 4</option>
        </select><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" id="appointment_date"><br>

        <label for="appointment_time">Appointment Time:</label>
        <input type="time" name="appointment_time" id="appointment_time"><br>

        <label for="special_requirements">Special Requirements or Medical Conditions:</label>
        <textarea name="special_requirements" id="special_requirements"></textarea><br>

        <label for="contact_info">Patient's Contact Information:</label>
        <input type="checkbox" name="update_contact_info" id="update_contact_info">
        <label for="update_contact_info">Update contact info if needed</label><br>

        <input type="submit" value="Submit">

    </form>
    <div id="successMessage">

    </div>
</div>

<?php include_once 'templates/footer.php'; ?>