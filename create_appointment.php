<?php
header("Content-Type: application/json"); // Ensure the response is JSON

try {
    // Connect to the SQLite database
    $db = new SQLite3('appointments.db');
} catch (Exception $e) {
    echo json_encode(['error' => 'Failed to connect to the database']);
    exit();
}

// Retrieve the appointment data from POST request
$customerName = $_POST['customerName'] ?? null;
$makeupName = $_POST['makeupName'] ?? null;
$makeupArtist = $_POST['makeupArtist'] ?? null;
$appointmentTime = $_POST['appointmentTime'] ?? null;
$appointmentDate = $_POST['appointmentDate'] ?? null;

// Validate input data
if (!$customerName || !$makeupName || !$makeupArtist || !$appointmentTime || !$appointmentDate) {
    echo json_encode(['error' => 'Invalid input data']);
    exit();
}

// Insert the appointment into the database
$query = "INSERT INTO appointments (customer_name, makeup_name, makeup_artist, appointment_time, appointment_date)
          VALUES ('$customerName', '$makeupName', '$makeupArtist', '$appointmentTime', '$appointmentDate')";

if ($db->exec($query)) {
    echo json_encode(['message' => 'Appointment created successfully']);
} else {
    echo json_encode(['error' => 'Failed to create appointment']);
}
?>
