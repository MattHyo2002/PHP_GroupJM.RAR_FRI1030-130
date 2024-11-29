<?php
session_start(); // Ensure session is started

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Simulated function to get the current user
function getCurrentUser() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

// Check if the user is logged in
$currentUser = getCurrentUser();
if ($currentUser) {
    echo json_encode(["success" => false, "message" => "User already logged in", "current_user" => $currentUser]);
    exit;
}

// Decode the incoming JSON request for signup
$data = json_decode(file_get_contents("php://input"), true);

// Validate the signup data
if (!empty($data['fname']) && !empty($data['lname']) && !empty($data['email']) && !empty($data['password']) && !empty($data['address'])) {
    // Simulate saving user to the database and setting the session
    $newUser = [
        'fname' => $data['fname'],
        'lname' => $data['lname'],
        'email' => $data['email'],
        'address' => $data['address'],
    ];

    // Store the user data in session
    $_SESSION['user'] = $newUser;

    // Debugging: Check if the user data is in the session
    print_r($_SESSION); // Add this line to see session content

    // Respond with success
    echo json_encode(["success" => true, "message" => "User signed up successfully", "user" => $newUser]);
} else {
    // Respond with error if validation fails
    echo json_encode(["success" => false, "message" => "Invalid input data. All fields are required."]);
}
?>