<?php
require_once('../../includes/storeclass.php');
//endpoint for adding user to db ajax

if (isset($_POST['add'])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $role = $_POST["role"];

    // Generate a hashed password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $store = new Langgam();
    $pdo = $store->openConnection();

    $sql = "INSERT INTO branch2_users (firstName, lastName, username, password, mobile, email, address, role) VALUES (:firstName, :lastName, :username, :password, :mobile, :email, :address, :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'username' => $username,
        'password' => $hashedPassword,
        // Store the hashed password
        'mobile' => $mobile,
        'email' => $email,
        'address' => $address,
        'role' => $role
    ]);

    if ($stmt->rowCount() > 0) {
        $message = "User added successfully.";
    } else {
        $message = "Error: Unable to add user.";
    }


    // Return the response as a JSON object
    header('Content-Type: application/json');
    echo json_encode($message);

    $pdo = null;
}