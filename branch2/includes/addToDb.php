<?php
require_once('../../includes/storeclass.php');
require_once('users_function.php');
//endpoint for adding user to db ajax
session_start();

$users = new Users();

    $ID = $users->getID();
    $first_name = $ID[0]->firstName;
    $last_name = $ID[0]->lastName;
    $uid = $ID[0]->ID;
    $username_crud = $ID[0]->username;
    $role_crud = $ID[0]->role;
    $added_by = $first_name . ' ' . $last_name;
    
    date_default_timezone_set('Asia/Manila');

    $time = date('H:i:s');   
    $date = date('Y-m-d');

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

    $sql = "INSERT INTO branch2_users (firstName, lastName, username, password, mobile, email, address, role, date_added) VALUES (:firstName, :lastName, :username, :password, :mobile, :email, :address, :role, :date_added)";
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
        'role' => $role,
        'date_added' => $date
    ]);

    if ($stmt->rowCount() > 0) {
        $message = "User added successfully.";

        $record_id = $pdo->lastInsertId();
        $add = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
        $stmt_crud = $pdo->prepare($add);
        $stmt_crud->execute([
            'action_type'=> "Created an Account",
            'user_id' => $uid,
            'username' => $username_crud,
            'full_name' => $added_by,
            'role' => $role_crud,
            'time' => $time,
            'date' => $date,
            'table_name'=> "Accounts",
            'record_id' => $record_id
        ]);
    } else {
        $message = "Error: Unable to add user.";
    }


    // Return the response as a JSON object
    header('Content-Type: application/json');
    echo json_encode($message);

    $pdo = null;
}