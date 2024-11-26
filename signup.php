<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Decode the incoming JSON request
$data = json_decode(file_get_contents("php://input"), true);

// Validate the data
if (!empty($data['fname']) && !empty($data['lname']) && !empty($data['email']) && !empty($data['password']) && !empty($data['address'])) {
    // Respond with success
    echo json_encode(["success" => true, "message" => "Data validated successfully"]);
} else {
    // Respond with error
    echo json_encode(["success" => false, "message" => "Invalid input data. All fields are required."]);
}
?>
