<?php
session_start();
header("Content-Type: application/json");

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Simulate database or session check
    if (isset($_SESSION['user']) && $_SESSION['user']['email'] === $email) {
        echo json_encode([
            'success' => true,
            'user' => $_SESSION['user']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'User not found'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Email parameter is missing'
    ]);
}
?>
