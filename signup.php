<?php
// Start the session
session_start();

// Set headers to handle JSON requests
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Decode the incoming JSON request
$data = json_decode(file_get_contents("php://input"), true);

// Validate the data
if (!empty($data['fname']) && !empty($data['lname']) && !empty($data['email']) && !empty($data['password']) && !empty($data['address'])) {
    // Store user information in the session
    $_SESSION['user'] = [
        'fname' => $data['fname'],
        'lname' => $data['lname'],
        'email' => $data['email'],
        'address' => $data['address']
    ];

    // Respond with a success message
    echo json_encode([
        "success" => true,
        "message" => "Sign-up successful and session set!"
    ]);
} else {
    // Respond with an error if any field is missing
    echo json_encode([
        "success" => false,
        "message" => "Invalid input data. All fields are required."
    ]);
}
?>
