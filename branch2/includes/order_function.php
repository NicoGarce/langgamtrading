<?php
require_once('../../includes/storeclass.php');
require_once('users_function.php');

$store = new Langgam;
$users = new Users;

session_start();
if (isset($_POST['create_order'])) {
    
    // Set the time zone to Asia/Manila
    date_default_timezone_set('Asia/Manila');
    
    // Get the current date and time in the desired format
    $order_date = date('Y-m-d'); // Format the date as 'YYYY-MM-DD'
    $order_time = date('H:i:s');
    
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
    $order_status = $_POST["order_status"];
    $user_id = $_POST["user_id"];
    $salesperson = $_POST["salesperson"];
    
    $pdo = $store->openConnection();

    if ($order_status === "Complete") {
        $sqlSales = "INSERT INTO branch2_sales (
                        customer_name,
                        order_date,
                        order_time,
                        contact_info, 
                        order_type, 
                        shipping_details, 
                        order_list, 
                        pay_method, 
                        total_cost, 
                        user_id,
                        salesperson,
                        payment_status,
                        order_status,
                        date_complete,
                        time_complete
                    ) 
                    VALUES ( 
                        :customer_name,
                        :order_date,
                        :order_time,
                        :contact_info, 
                        :order_type, 
                        :shipping_details, 
                        :order_list, 
                        :pay_method, 
                        :total_cost,
                        :user_id, 
                        :salesperson,
                        :pay_status,
                        :order_status,
                        :date_complete,
                        :time_complete
                    )";
    
        $stmtSales = $pdo->prepare($sqlSales);
    
        // Serialize the orderList array as JSON
        $orderListJson = json_encode($orderList);
    
        $stmtSales->execute([
            ':customer_name' => $customer_name,
            ':order_date' => $order_date,
            ':order_time' => $order_time,
            ':contact_info' => $contact_info,
            ':order_type' => $order_type,
            ':shipping_details' => $shipping_details,
            ':order_list' => $orderListJson,
            ':pay_method' => $pay_method,
            ':total_cost' => $total_cost,
            ':pay_status' => $pay_status,
            ':order_status' => $order_status,
            ':user_id' => $user_id,
            ':salesperson' => $salesperson,
            ':date_complete' => $order_date,
            ':time_complete' => $order_time
        ]);

        $record_id = $pdo->lastInsertId();
        if ($stmtSales->rowCount() > 0) {

            foreach ($orderList as $item) {
                $product_name = $item["product_name"];
                $quantity_ordered = $item["quantity"];
        
                $sqlUpdateStock = "UPDATE branch2_inventory SET stock = stock - :quantity_ordered WHERE product_name = :product_name";
        
                $stmtUpdateStock = $pdo->prepare($sqlUpdateStock);
                $stmtUpdateStock->execute([
                    ':quantity_ordered' => $quantity_ordered,
                    ':product_name' => $product_name
                ]);
            }

            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username_crud = $ID[0]->username;
            $role_crud = $ID[0]->role;
            $added_by = $first_name.' '.$last_name;
            
            
            $time = date('H:i:s'); 
            $date = date('Y-m-d');

            $add = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                    VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
            $stmt_crud = $pdo->prepare($add);
            $stmt_crud->execute([
                'action_type'=> "Created a Sale",
                'user_id' => $uid,
                'username' => $username_crud,
                'full_name' => $added_by,
                'role' => $role_crud,
                'time' => $time,
                'date' => $date,
                'table_name'=> "Sales",
                'record_id' => $record_id
            ]);

            $message = "Order Complete. Sale made successfully";
            
        } else {
            $message = "Error: Unable to add order as a sale.";
        }
    }
    
    else {
                $sql = "INSERT INTO branch2_orders (
                    customer_name,
                    order_date,
                    order_time,
                    contact_info, 
                    order_type, 
                    shipping_details, 
                    order_list, 
                    pay_method, 
                    total_cost,
                    user_id,
                    salesperson,
                    payment_status,
                    order_status
                    
                ) 
                VALUES ( 
                    :customer_name,
                    :order_date,
                    :order_time,
                    :contact_info, 
                    :order_type, 
                    :shipping_details, 
                    :order_list, 
                    :pay_method, 
                    :total_cost, 
                    :user_id,
                    :salesperson,
                    :pay_status,
                    :order_status
                )";

        $stmt = $pdo->prepare($sql);

        // Serialize the orderList array as JSON
        $orderListJson = json_encode($orderList);

        $stmt->execute([
            ':customer_name' => $customer_name,
            ':order_date' => $order_date,
            ':order_time' => $order_time,
            ':contact_info' => $contact_info,
            ':order_type' => $order_type,
            ':shipping_details' => $shipping_details,
            ':order_list' => $orderListJson,
            ':pay_method' => $pay_method,
            ':total_cost' => $total_cost,
            ':pay_status' => $pay_status,
            ':order_status' => $order_status,
            ':user_id' => $user_id,
            ':salesperson' => $salesperson
        ]);
        
        $record_id = $pdo->lastInsertId();
        if ($stmt->rowCount() > 0) {
            // Decrease stock in branch2_inventory for each item in the order
            foreach ($orderList as $item) {
                $product_name = $item["product_name"];
                $quantity_ordered = $item["quantity"];

                $sqlUpdateStock = "UPDATE branch2_inventory SET stock = stock - :quantity_ordered WHERE product_name = :product_name";

                $stmtUpdateStock = $pdo->prepare($sqlUpdateStock);
                $stmtUpdateStock->execute([
                    ':quantity_ordered' => $quantity_ordered,
                    ':product_name' => $product_name
                ]);
            }

            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username_crud = $ID[0]->username;
            $role_crud = $ID[0]->role;
            $added_by = $first_name.' '.$last_name;
            
            $time = date('H:i:s'); 
            $date = date('Y-m-d');
            
            $add = "INSERT INTO branch2_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                    VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
            $stmt_crud = $pdo->prepare($add);
            $stmt_crud->execute([
                'action_type'=> "Created an Order",
                'user_id' => $uid,
                'username' => $username_crud,
                'full_name' => $added_by,
                'role' => $role_crud,
                'time' => $time,
                'date' => $date,
                'table_name'=> "Orders",
                'record_id' => $record_id
            ]);

            $message = "Order added successfully.";
        } else {
            $message = "Error: Unable to add order.";
        }
    }


    // Return the response as a JSON object
    header('Content-Type: application/json');
    echo json_encode($message);

    $pdo = null;
}

?>