<?php

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