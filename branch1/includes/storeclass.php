<?php

class Langgam
{
    //connecting to db and PDO
    private $server = "mysql:host=localhost;dbname=langgamtrading";
    private $user = "root";
    private $pass = "";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>
        PDO::FETCH_ASSOC
    );
    protected $con;

    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
            echo "There is a problem with the connection: " . $e->getMessage();
            return null; // Return NULL when there is an exception
        }
    }


    public function closeConnection()
    {
        $this->con = null;
    } 
   
    

   
    
    //ORDERS FUNCTIONS
    public function get_orders()
    {
        $conn = $this->openConnection();
        $stmt = $conn->prepare("SELECT * FROM branch1_orders");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    

    
}
$store = new Langgam();