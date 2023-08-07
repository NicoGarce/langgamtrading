<?php
require_once('storeclass.php');


$email = $_POST['email'];


$store = new Langgam();
$pdo = $store->openConnection();
$sql = "SELECT * FROM branch2_users WHERE email=:email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);

if ($stmt->rowCount() > 0) {
    
    echo "<span style='color:red'>Email already in use.</span>";
} else {
    
    echo "<span style='color:green'>Email Available.</span>";
}
