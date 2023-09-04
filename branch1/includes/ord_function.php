<?php

class Orders
{
    public function get_orders(){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_orders");
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

    public function get_order_by_id($order_id){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_orders WHERE order_id = :order_id");
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
    
    public function update_stat(){

        $store = new Langgam();
        $users = new Users();
        $conn = $store->openConnection();

        if(isset($_POST['update_order'])){
            $order_id = $_POST["ID"] ?? '';
            $update_pay_stat =$_POST["pay_status"] ?? '';
            $update_ord_stat =$_POST["order_status"] ?? '';


            $ID = $users->getID();


            $sql = "UPDATE branch1_orders SET payment_status = :payment_status, order_status = :order_status WHERE order_id = :order_id";
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

    public function delete_order()
    {
        $store = new Langgam();
        if (isset($_REQUEST['delete'])) {
            $order_id = $_GET['order_id'] ?? '';

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch1_orders where order_id =:order_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':order_id' => $order_id]);


        }
    }

}
$orders = new Orders();
