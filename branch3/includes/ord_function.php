<?php

class Orders
{
    public function get_orders()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_orders WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded')");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);


        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->order_id = $result->order_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }

    public function get_voided()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_orders WHERE order_status IN ('Cancelled', 'Returned', 'Refunded')");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);


        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->order_id = $result->order_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }
    
    public function get_order_by_id($order_id)
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_orders WHERE order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);

        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->order_id = $result->order_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }

    public function move_to_sales($order_id)
    {
        $store = new Langgam();
        $users = new Users();

        $conn = $store->openConnection();
        
        date_default_timezone_set('Asia/Manila');

        $time_complete = date('H:i:s');   
        $date_complete = date('Y-m-d');

        $stmt = $conn->prepare("SELECT * FROM branch3_orders WHERE order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$order) {
            // Handle the case where the order is not found
            return false;
        }

        $update_ord_stat = $_POST["order_status"] ?? '';
        
        $stmt = $conn->prepare("INSERT INTO branch3_sales (customer_name, order_date, order_time, contact_info, order_type, shipping_details, user_id, salesperson, order_list, pay_method, total_cost, order_status, payment_status, date_complete, time_complete)
                        VALUES ( :customer_name, :order_date, :order_time, :contact_info, :order_type, :shipping_details, :user_id, :salesperson, :order_list, :pay_method, :total_cost, :order_status, :payment_status, :date_complete, :time_complete)");
        $stmt->execute([
            ':customer_name' => $order['customer_name'],
            ':order_date' => $order['order_date'],
            ':order_time' => $order['order_time'],
            ':contact_info' => $order['contact_info'],
            ':order_type' => $order['order_type'],
            ':shipping_details' => $order['shipping_details'],
            ':user_id' => $order['user_id'],
            ':salesperson' => $order['salesperson'],
            ':order_list' => $order['order_list'],
            ':pay_method' => $order['pay_method'],
            ':total_cost' => $order['total_cost'],
            ':order_status' => $update_ord_stat, // Update order_status to 'Complete'
            ':payment_status' => 'Paid',   // Update payment_status to 'Paid'
            ':date_complete' => $date_complete,
            ':time_complete' => $time_complete
        ]);

        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;
            
            $time = date('H:i:s');   
            $date = date('Y-m-d');

            $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $conn->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Made a Sale",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' =>$added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Orders',
                    'record_id' => $order_id
                ]);
                
            $stmt = $conn->prepare("DELETE FROM branch3_orders WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
            $stmt->execute();

            // Return true to indicate success
            return true;
        } else {
            // Return false to indicate failure
            return false;
        }
    }



    public function update_stat()
    {
        $store = new Langgam();
        $users = new Users();

        $conn = $store->openConnection();

        if (isset($_POST['update_order'])) {
            $order_id = $_POST["ID"] ?? '';
            $update_pay_stat = $_POST["pay_status"] ?? '';
            $update_ord_stat = $_POST["order_status"] ?? '';

            // Check if the order status is "Complete"
            if ($update_ord_stat === 'Complete') {
                $success = $this->move_to_sales($order_id);

                if ($success) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Complete',
                            text: 'Sale successfully made.',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                        </script>";
                            } else {
                                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to move order to sales',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        });
                        </script>";
                }
            } elseif (in_array($update_ord_stat, ['Cancelled', 'Returned', 'Refunded'])) {
                // Order is cancelled, returned, or refunded
                // Retrieve order details including the products
                $order = $this->get_order_by_id($order_id);
                if (!$order) {
                    // Handle the case where the order is not found
                    echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Order not found',
                                showConfirmButton: false,
                                timer: 2000,
                                showClass: {
                                    popup: 'swal2-show'
                                }
                            });
                            </script>";
                    return;
                }

                // Iterate through the products in the order list
                $order_list = json_decode($order->order_list);
                if ($order_list) {
                    foreach ($order_list as $orderItem) {
                        $product_name = $orderItem->product_name;
                        $quantity = $orderItem->quantity;

                        // Retrieve the current stock quantity for the product
                        $stmt = $conn->prepare("SELECT stock FROM branch3_inventory WHERE product_name = :product_name");
                        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                        $stmt->execute();
                        $current_stock = $stmt->fetchColumn();

                        if ($current_stock !== false) {
                            // Calculate the new stock quantity after adding back the ordered quantity
                            $void_stock = $current_stock + $quantity;

                            $stmt = $conn->prepare("UPDATE branch3_inventory SET stock = :void_stock WHERE product_name = :product_name");
                            $stmt->bindParam(':void_stock', $void_stock, PDO::PARAM_INT);
                            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                            $stmt->execute();
                        }
                    }
                }

                // Update the order status and payment status
                $sql = "UPDATE branch3_orders SET payment_status = :payment_status, order_status = :order_status WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'order_id' => $order_id,
                    'payment_status' => $update_pay_stat,
                    'order_status' => $update_ord_stat
                ]);

                if ($stmt->rowCount() !== false) {
                    $ID = $users->getID();
                    $first_name = $ID[0]->firstName;
                    $last_name = $ID[0]->lastName;
                    $uid = $ID[0]->ID;
                    $username = $ID[0]->username;
                    $role = $ID[0]->role;
                    $added_by = $first_name . ' ' . $last_name;
                    
                    $time = date('H:i:s');   
                    $date = date('Y-m-d');

                    $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                                VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                        $stmt = $conn->prepare($edit);
                        $stmt->execute([
                            'action_type'=>"Voided an Order",
                            'user_id' => $uid,
                            'username' => $username,
                            'full_name' =>$added_by,
                            'role' => $role,
                            'time' => $time,
                            'date' => $date,
                            'table_name' => 'Orders',
                            'record_id' => $order_id
                        ]);

                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Order updated successfully',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                        </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to update order',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        });
                        </script>";
                }
            }
            else{
                $sql = "UPDATE branch3_orders SET payment_status = :payment_status, order_status = :order_status WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'order_id' => $order_id,
                    'payment_status' => $update_pay_stat,
                    'order_status' => $update_ord_stat
                ]);

                if ($stmt->rowCount() !== false) {
                    $ID = $users->getID();
                    $first_name = $ID[0]->firstName;
                    $last_name = $ID[0]->lastName;
                    $uid = $ID[0]->ID;
                    $username = $ID[0]->username;
                    $role = $ID[0]->role;
                    $added_by = $first_name . ' ' . $last_name;
                    
                    $time = date('H:i:s');   
                    $date = date('Y-m-d');

                    $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                                VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                        $stmt = $conn->prepare($edit);
                        $stmt->execute([
                            'action_type'=>"Updated an Order/Payment Status",
                            'user_id' => $uid,
                            'username' => $username,
                            'full_name' =>$added_by,
                            'role' => $role,
                            'time' => $time,
                            'date' => $date,
                            'table_name' => 'Orders',
                            'record_id' => $order_id
                        ]);

                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Order updated successfully',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        }).then(function() {
                            window.location.href = window.location.href;
                        });
                        </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to update order',
                            showConfirmButton: false,
                            timer: 2000,
                            showClass: {
                                popup: 'swal2-show'
                            }
                        });
                        </script>";
                }
            }
        }
    }




    public function delete_order()
    {
        $store = new Langgam();
        $users = new Users();
        if (isset($_REQUEST['delete'])) {
            $order_id = $_GET['order_id'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch3_orders where order_id =:order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);

            if ($stmt->rowCount() !== false) {
                
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Removed an Order",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' =>$added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Orders',
                    'record_id' => $order_id
                ]);
            }
        }
    }


    public function getTopVoided()
    {
        $store = new Langgam();
        $conn = $store->openConnection();

        // Select sales with 'Cancelled', 'Returned', and 'Refunded' statuses
        $stmt = $conn->prepare("SELECT * FROM branch3_orders WHERE order_status IN ('Cancelled', 'Returned', 'Refunded')");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_status' to each order item
                    $orderItem->order_status = $result->order_status;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        // Calculate item counts based on order status
        $itemCounts = [];

        foreach ($orderItems as $orderItem) {
            $productName = $orderItem->product_name;
            $orderStatus = $orderItem->order_status;

            if (!isset($itemCounts[$productName])) {
                $itemCounts[$productName] = ['Cancelled' => 0, 'Returned' => 0, 'Refunded' => 0];
            }

            $itemCounts[$productName][$orderStatus]++;
        }

        // Get the top 1 most cancelled, returned, and refunded items
        $top1Items = [];
        foreach ($itemCounts as $productName => $counts) {
            arsort($counts);
            $topStatus = array_key_first($counts);
            $top1Items[$topStatus] = $productName;
        }

        return $top1Items;
    }

    public function delete_voided()
    {
        $store = new Langgam();
        $users = new Users();
        if (isset($_REQUEST['delete'])) {
            $order_id = $_GET['order_id'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $uid = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $added_by = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch3_orders where order_id =:order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);

            if ($stmt->rowCount() !== false) {
                
                date_default_timezone_set('Asia/Manila');

                $time = date('H:i:s');   
                $date = date('Y-m-d');

                $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, time, date, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :time, :date, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Removed a Voided Order",
                    'user_id' => $uid,
                    'username' => $username,
                    'full_name' =>$added_by,
                    'role' => $role,
                    'time' => $time,
                    'date' => $date,
                    'table_name' => 'Voided',
                    'record_id' => $order_id
                ]);
            }
        }
    }
}
$orders = new Orders();
