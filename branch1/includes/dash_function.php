<?php
require_once('users_function.php');
class Dashboard{
    public function inv_row()
    {
        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch1_inventory";
        $pdo = $store->openConnection();
        // Execute the query and fetch the result
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();

        // Close the connection
        $pdo = null;

        return $rowCount;
    }

    public function sale_row()
    {
        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch1_sales";
        $pdo = $store->openConnection();
        // Execute the query and fetch the result
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();

        // Close the connection
        $pdo = null;

        return $rowCount;
    }

    public function ord_row()
    {
        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch1_orders WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded')";
        $pdo = $store->openConnection();
        // Execute the query and fetch the result
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();

        // Close the connection
        $pdo = null;

        return $rowCount;
    }

    public function emp_ord_row()
    {
        $users = new Users;
        $result = $users->getID();
        $user_id = $result[0]->ID;

        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch1_orders WHERE order_status NOT IN ('Cancelled', 'Returned', 'Refunded') AND user_id = :user_id";
        $pdo = $store->openConnection();
        // Execute the query and fetch the result
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();

        // Close the connection
        $pdo = null;

        return $rowCount;
    }

    public function acc_row()
    {
        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch1_users";
        $pdo = $store->openConnection();
        // Execute the query and fetch the result
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rowCount = $stmt->fetchColumn();

        // Close the connection
        $pdo = null;

        return $rowCount;
    }
}

$dash = new Dashboard();