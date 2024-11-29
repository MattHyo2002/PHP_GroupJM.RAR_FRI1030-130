<?php

try {
    $db = new SQLite3('appointments.db');
} catch (Exception $e) {
    echo "Failed to connect to the database: " . $e->getMessage();
    exit();
}

// Retrieve the appointment data from POST request
$customerName = $_POST['customerName'];
$makeupName = $_POST['makeupName'];
$makeupArtist = $_POST['makeupArtist'];
$appointmentTime = $_POST['appointmentTime'];
$appointmentDate = $_POST['appointmentDate'];

// Insert the appointment into the database
$query = "INSERT INTO appointments (customer_name, makeup_name, makeup_artist, appointment_time, appointment_date)
          VALUES ('$customerName', '$makeupName', '$makeupArtist', '$appointmentTime', '$appointmentDate')";

if ($db->exec($query)) {
    echo json_encode(['message' => 'Appointment created successfully']);
} else {
    echo json_encode(['message' => 'Failed to create appointment']);
}

?>

