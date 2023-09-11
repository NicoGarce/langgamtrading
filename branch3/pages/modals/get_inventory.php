<?php
require_once('../../../includes/storeclass.php');
require_once('../../../branch3/includes/inv_function.php');

$products = $inventory->get_inventory();
header('Content-Type: application/json');
echo json_encode($products);
?>