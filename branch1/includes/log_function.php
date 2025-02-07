<?php

class Logs{
    public function get_log_history(){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_crud ORDER BY date DESC, time DESC LIMIT 100;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function get_user_logs(){
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_user_logs ORDER BY log_date DESC, log_time DESC LIMIT 100;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_emp_logs(){
        $users = new Users();
        $user = $users->getID();
        $uid = $user[0]->ID;
    
        $store = new Langgam();
        $conn = $store->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_user_logs WHERE user_id = :user_id ORDER BY log_date DESC, log_time DESC LIMIT 10;");
        $stmt->bindParam(':user_id', $uid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
$logs = new Logs();
?>