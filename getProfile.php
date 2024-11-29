<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Return user data as JSON
    echo json_encode([
        'success' => true,
        'user' => $_SESSION['user']
    ]);
} else {
    // If no user is logged in
    echo json_encode([
        'success' => false,
        'message' => 'User not logged in'
    ]);
}
?>