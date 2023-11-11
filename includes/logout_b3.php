<?php
require_once('storeclass.php');
require_once('../branch3/includes/users_function.php');

session_start();
$store = new Langgam();
$users = new Users();

$conn = $store->openConnection();

// Check if the user is logged in before trying to log them out
if (isset($_SESSION['ID'])) {
    $user_id = $_SESSION['ID'];
    $users = $users->getID();

    $name = ($users[0]->firstName . ' ' . $users[0]->lastName);
    $username = $users[0]->username;
    $role = $users[0]->role;

    date_default_timezone_set('Asia/Manila');
    $log_time = date('H:i:s');
    $log_date = date('Y-m-d');

    // Insert the extracted information into the database
    $log = "INSERT INTO branch3_user_logs (user_id, name, username, role, action, log_time, log_date) VALUES (:user_id, :name, :username, :role, :action, :log_time, :log_date)";
    $stmt = $conn->prepare($log);
    $stmt->execute([
        'user_id' => $user_id,
        'name' => $name,
        'username' => $username,
        'role' => $role,
        'action' => 'Logged Out',
        'log_time' => $log_time,
        'log_date' => $log_date
    ]);

    // Destroy the session
    session_destroy();
}

header("Location: ../index.php");
exit();
