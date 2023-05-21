<?php
require_once('storeclass.php');
//endpoint for adding user to db ajax

if (isset($_POST['edit'])) {
    $userid = $_GET['ID'] ?? '';
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $role = $_POST["role"];

    // Generate a hashed password using bcrypt
    $store = new Langgam();
    $pdo = $store->openConnection();

    $sql = "UPDATE users (firstName, lastName, username, mobile, email, address, role) VALUES (:firstName, :lastName, :username, :mobile, :email, :address, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'username' => $username,
        'mobile' => $mobile,
        'email' => $email,
        'address' => $address,
        'role' => $role
    ]);

    if ($stmt->rowCount() > 0) {
        $message = "User updated successfully.";
    } else {
        $message = "Error: Unable to add user.";
    }


    // Return the response as a JSON object
    header('Content-Type: application/json');
    echo json_encode($message);

    $pdo = null;
}