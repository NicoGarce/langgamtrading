<?php
require_once('../../includes/storeclass.php');
require_once('../../branch1/includes/users_function.php');

// Assuming the old password is sent via POST as 'old-pass'
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Start the session (if not already started)
session_start();

// Check if $_SESSION['ID'] is set before using it
if (isset($_SESSION['ID'])) {
    $uid = $_SESSION['ID'];

    $store = new Langgam();
    $pdo = $store->openConnection();
    $sql = "SELECT password FROM branch3_users WHERE ID= :uid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['uid' => $uid]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false && isset($result['password'])) {
        $hashedPassword = $result['password'];

        if (password_verify($password, $hashedPassword)) {
            echo json_encode(['valid' => true, 'message' => 'Current Password Confirmed.']);
        } else {
            echo json_encode(['valid' => false, 'message' => 'Try Again, Current Password is incorrect.']);
        }
    } else {
        echo json_encode(['valid' => false, 'message' => 'Error retrieving password or user ID is invalid.']);
    }
} else {
    echo json_encode(['valid' => false, 'message' => 'User session not available.']);
}
?>