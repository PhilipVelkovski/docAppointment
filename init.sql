DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS doctors;
DROP TABLE IF EXISTS patients;

CREATE TABLE patients (
    patientID INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    doctor VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL
);

CREATE TABLE doctors (
    doctorID INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    specialty VARCHAR(100) NOT NULL
);
INSERT INTO doctors (firstname, lastname, specialty) VALUES
    ('Doc 1 Firstname', 'Doc 1 Lastname', 'Specialty 1'),
    ('Doc 2 Firstname', 'Doc 2 Lastname', 'Specialty 2'),
    ('Doc 3 Firstname', 'Doc 3 Lastname', 'Specialty 3'),
    ('Doc 4 Firstname', 'Doc 4 Lastname', 'Specialty 4');
    
CREATE TABLE appointments (
    AppointmentID INT PRIMARY KEY AUTO_INCREMENT,
    PatientID INT,
    PatientName VARCHAR(100), 
    PatientTelephone VARCHAR(20),
    DoctorID INT,
    AppointmentDate DATETIME NOT NULL,
    AppointmentTime VARCHAR(100),
    Status ENUM('booked', 'confirmed', 'canceled') NOT NULL,
    Notes TEXT,
    ReschedulingHistory TEXT,
    FOREIGN KEY (PatientID) REFERENCES patients(PatientID),
    FOREIGN KEY (DoctorID) REFERENCES doctors(DoctorID)
);

