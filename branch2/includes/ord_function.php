<?php

class Orders
{
    public function get_orders()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_orders WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded')");
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
        $stmt = $conn->prepare("SELECT * FROM branch2_orders WHERE order_status IN ('Cancelled', 'Returned', 'Refunded')");
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
        $stmt = $conn->prepare("SELECT * FROM branch2_orders WHERE order_id = :order_id");
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
        $conn = $store->openConnection();

        $stmt = $conn->prepare("SELECT * FROM branch2_orders WHERE order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$order) {
            // Handle the case where the order is not found
            return false;
        }

        $update_ord_stat = $_POST["order_status"] ?? '';
        
        $stmt = $conn->prepare("INSERT INTO branch2_sales (customer_name, order_date, order_time, contact_info, order_type, shipping_details, salesperson, order_list, pay_method, total_cost, order_status, payment_status)
                        VALUES ( :customer_name, :order_date, :order_time, :contact_info, :order_type, :shipping_details, :salesperson, :order_list, :pay_method, :total_cost, :order_status, :payment_status)");
        $stmt->execute([
            ':customer_name' => $order['customer_name'],
            ':order_date' => $order['order_date'],
            ':order_time' => $order['order_time'],
            ':contact_info' => $order['contact_info'],
            ':order_type' => $order['order_type'],
            ':shipping_details' => $order['shipping_details'],
            ':salesperson' => $order['salesperson'],
            ':order_list' => $order['order_list'],
            ':pay_method' => $order['pay_method'],
            ':total_cost' => $order['total_cost'],
            ':order_status' => $update_ord_stat, // Update order_status to 'Complete'
            ':payment_status' => 'Paid',   // Update payment_status to 'Paid'
        ]);

        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            
            $stmt = $conn->prepare("DELETE FROM branch2_orders WHERE order_id = :order_id");
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
                        $stmt = $conn->prepare("SELECT stock FROM branch2_inventory WHERE product_name = :product_name");
                        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                        $stmt->execute();
                        $current_stock = $stmt->fetchColumn();

                        if ($current_stock !== false) {
                            // Calculate the new stock quantity after adding back the ordered quantity
                            $void_stock = $current_stock + $quantity;

                            $stmt = $conn->prepare("UPDATE branch2_inventory SET stock = :void_stock WHERE product_name = :product_name");
                            $stmt->bindParam(':void_stock', $void_stock, PDO::PARAM_INT);
                            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
                            $stmt->execute();
                        }
                    }
                }

                // Update the order status and payment status
                $sql = "UPDATE branch2_orders SET payment_status = :payment_status, order_status = :order_status WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'order_id' => $order_id,
                    'payment_status' => $update_pay_stat,
                    'order_status' => $update_ord_stat
                ]);

                if ($stmt->rowCount() !== false) {
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
                $sql = "UPDATE branch2_orders SET payment_status = :payment_status, order_status = :order_status WHERE order_id = :order_id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'order_id' => $order_id,
                    'payment_status' => $update_pay_stat,
                    'order_status' => $update_ord_stat
                ]);

                if ($stmt->rowCount() !== false) {
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
        if (isset($_REQUEST['delete'])) {
            $order_id = $_GET['order_id'] ?? '';

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch2_orders where order_id =:order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);
        }
    }
}
$orders = new Orders();
