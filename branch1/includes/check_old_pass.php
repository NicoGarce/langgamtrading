<?php
require_once('../../includes/storeclass.php');
require_once('../../branch1/includes/users_function.php');

$oldPassword = $_POST['old-pass'];

// Start the session (if not already started)
session_start();

// Check if $_SESSION['ID'] is set before using it
if (isset($_SESSION['ID'])) {
    $uid = $_SESSION['ID'];

    $store = new Langgam();
    $pdo = $store->openConnection();
    $sql = "SELECT password FROM branch1_users WHERE ID= :uid";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['uid' => $uid]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false && isset($result['password'])) {
        $hashedPassword = $result['password'];

        if (password_verify($oldPassword, $hashedPassword)) {
            echo "<span style='color:green'>Current Password Confirmed.</span>";
        } else {
            echo "<span style='color:red'>Try Again, Current Password is incorrect.</span>";
        }
    } else {
        echo "<span style='color:red'>Error retrieving password or user ID is invalid.</span>";
    }
} else {
    echo "<span style='color:red'>User session not available.</span>";
}
?>
