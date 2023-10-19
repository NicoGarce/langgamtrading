<?php

class Logs{
    public function get_log_history(){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_crud ORDER BY date DESC, time DESC LIMIT 100;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function get_user_logs(){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch2_user_logs ORDER BY log_date DESC, log_time DESC LIMIT 100;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
$logs = new Logs();
?>