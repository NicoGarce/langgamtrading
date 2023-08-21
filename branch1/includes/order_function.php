<?php
require_once('../../includes/storeclass.php');
$store = new Langgam;

if (isset($_POST['create_order'])) {

    $customer_name = $_POST["customer_name"];
    $contact_info = $_POST["contact_info"];
    $order_type = $_POST["order_type"];
    $shipping_details = $_POST["shipping_details"];

    // Use file_get_contents to get the JSON-encoded order_list
    $orderListJson = $_POST['order_list'];
    $orderList = json_decode($orderListJson, true); // Decode JSON to associative array
    $pay_method = $_POST["pay_method"];
    $total_cost = $_POST["total_cost"];
    $pay_status = $_POST["pay_status"];
    $salesperson = $_POST["salesperson"];
    
    $pdo = $store->openConnection();

    $sql = "INSERT INTO branch1_orders (
                customer_name, 
                contact_info, 
                order_type, 
                shipping_details, 
                order_list, 
                pay_method, 
                total_cost, 
                salesperson,
                payment_status,
                order_status
                
            ) 
            VALUES ( 
                :customer_name, 
                :contact_info, 
                :order_type, 
                :shipping_details, 
                :order_list, 
                :pay_method, 
                :total_cost, 
                :salesperson,
                :pay_status,
                'In Fulfillment'
            )";

    $stmt = $pdo->prepare($sql);

    // Serialize the orderList array as JSON
    $orderListJson = json_encode($orderList);

    $stmt->execute([
        ':customer_name' => $customer_name,
        ':contact_info' => $contact_info,
        ':order_type' => $order_type,
        ':shipping_details' => $shipping_details,
        ':order_list' => $orderListJson,
        ':pay_method' => $pay_method,
        ':total_cost' => $total_cost,
        ':pay_status' => $pay_status,
        ':salesperson' => $salesperson
    ]);

    if ($stmt->rowCount() > 0) {
        $message = "Order added successfully.";
    } else {
        $message = "Error: Unable to add order.";
    }

    // Return the response as a JSON object
    header('Content-Type: application/json');
    echo json_encode($message);

    $pdo = null;
}
?>