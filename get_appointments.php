<?php
header("Content-Type: application/json"); // Ensure the response is JSON

try {
    // Connect to the SQLite database
    $db = new SQLite3('appointments.db');
} catch (Exception $e) {
    http_response_code(500); // Set HTTP response code for internal server error
    echo json_encode(['error' => 'Failed to connect to the database: ' . $e->getMessage()]);
    exit();
}

try {
    // Query to fetch all appointments
    $results = $db->query("SELECT * FROM appointments");

    $appointments = [];
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) { // Fetch associative arrays
        $appointments[] = $row;
    }

    // Return JSON response
    http_response_code(200); // Set HTTP response code for success
    echo json_encode($appointments);
} catch (Exception $e) {
    http_response_code(500); // Set HTTP response code for internal server error
    echo json_encode(['error' => 'Failed to fetch appointments: ' . $e->getMessage()]);
}
?>
