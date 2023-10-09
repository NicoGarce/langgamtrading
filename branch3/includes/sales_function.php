<?php

class Sales{
    public function get_sales()
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_sales;");
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

    public function get_sale_by_id($sale_id)
    {
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch3_sales WHERE sale_id = :sale_id");
        $stmt->bindParam(':sale_id', $sale_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);

        $results = $stmt->fetchAll(PDO::FETCH_OBJ);

        $orderItems = [];

        foreach ($results as $result) {
            $orderList = json_decode($result->order_list);

            if ($orderList !== null) {
                foreach ($orderList as $orderItem) {
                    // Add the 'order_id' to each order item
                    $orderItem->sale_id = $result->sale_id;
                    $orderItems[] = $orderItem;
                }
            } else {
                // Handle decoding error if needed
            }
        }

        return $orderItems;
    }

    public function delete_sale()
    {
        $store = new Langgam();
        $users = new Users;

        if (isset($_REQUEST['delete'])) {
            $sale_id = $_GET['sale_id'] ?? '';
            $ID = $users->getID();
            $first_name = $ID[0]->firstName;
            $last_name = $ID[0]->lastName;
            $user_id = $ID[0]->ID;
            $username = $ID[0]->username;
            $role = $ID[0]->role;
            $fullname = $first_name . ' ' . $last_name;

            $pdo = $store->openConnection();
            $sql = "DELETE FROM branch3_sales where sale_id =:sale_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':sale_id' => $sale_id]);

            if ($stmt->rowCount() !== false) {

                $edit = "INSERT INTO branch3_crud (action_type, user_id, username, full_name, role, table_name, record_id)
                        VALUES (:action_type, :user_id, :username, :full_name, :role, :table_name, :record_id)";
                $stmt = $pdo->prepare($edit);
                $stmt->execute([
                    'action_type'=>"Removed a Sale",
                    'user_id' => $user_id,
                    'username' => $username,
                    'full_name' =>$fullname,
                    'role' => $role,
                    'table_name' => 'Sales',
                    'record_id' => $sale_id
                ]);
            }
        }
    }

}
$sales = new Sales();

?>