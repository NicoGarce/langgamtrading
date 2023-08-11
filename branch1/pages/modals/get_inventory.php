<?php
require_once('../../includes/storeclass.php');
// Assuming $store->get_inventory() returns an array of products
$products = $store->get_inventory();

header('Content-Type: application/json');
echo json_encode($products);
?>