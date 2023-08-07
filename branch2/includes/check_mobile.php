<?php
require_once('storeclass.php');

$mobile = $_POST['mobile'];

$store = new Langgam();
$pdo = $store->openConnection();
$sql = "SELECT * FROM branch2_users WHERE mobile=:mobile";
$stmt = $pdo->prepare($sql);
$stmt->execute(['mobile' => $mobile]);

if ($stmt->rowCount() > 0) {
   
    echo "<span style='color:red'>Mobile Number already in use.</span>";
} else {
   
    echo "<span style='color:green'>Mobile Number Available.</span>";
}
