<?php

class Dashboard{
    public function inv_row()
    {
        $store = new Langgam;
        $sql = "SELECT COUNT(*) FROM branch2_inventory";
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