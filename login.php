<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Decode the incoming JSON request
$data = json_decode(file_get_contents("php://input"), true);

// Validate the data
if (!empty($data['email']) && !empty($data['password'])) {
    echo json_encode(["success" => true, "message" => "Request validated"]);
} else {
    echo json_encode(["success" => false, "message" => "Email and password are required"]);
}
?>