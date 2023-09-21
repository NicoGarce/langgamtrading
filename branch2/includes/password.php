<?php
session_start();
require_once('../../includes/storeclass.php');
//endpoint for adding user to db ajax

if (isset($_POST['change'])) {

    if (isset($_SESSION['ID'])) {
        $uid = $_SESSION['ID'];
        $newPassword = $_POST['new-pass'];

        // Generate a hashed password using bcrypt
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $store = new Langgam();
        $pdo = $store->openConnection();

        $sql = "UPDATE branch2_users SET password = :password WHERE ID = :uid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'password' => $hashedPassword,
            'uid' => $uid
        ]);

        if ($stmt->rowCount() > 0) {
            $message = "Password change successful.";
        } else {
            $message = "Error: Unable to change password";
        }


        // Return the response as a JSON object
        header('Content-Type: application/json');
        echo json_encode($message);

        $pdo = null;
    }
}