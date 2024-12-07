<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['email']) && !empty($data['fname']) && !empty($data['lname']) && !empty($data['address'])) {
    $email = $data['email'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $address = $data['address'];

    // Update logic for your database
    $sql = "UPDATE users SET name = ?, address = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullName, $address, $email);

    $fullName = "$fname $lname";
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Profile updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating profile"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid input data"]);
}
?>
