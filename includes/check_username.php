<?php
require_once('storeclass.php');


$username = $_POST['username'];


$store = new Langgam();
$pdo = $store->openConnection();
$sql = "SELECT * FROM users WHERE username=:username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);

if ($stmt->rowCount() > 0) {
    
    echo "<span style='color:red'>Username already in use.</span>";
} else {
    
    echo "<span style='color:green'>Username available.</span>";
}
?>