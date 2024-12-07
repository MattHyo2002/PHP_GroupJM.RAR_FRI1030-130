<?php

// get_appointments.php
$db = new SQLite3('appointments.db');
$results = $db->query("SELECT * FROM appointments");

$appointments = [];
while ($row = $results->fetchArray()) {
    $appointments[] = $row;
}

echo json_encode($appointments);
?>
