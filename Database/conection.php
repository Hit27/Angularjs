<?php
class conection{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "Login";
    private $username = "root";
    private $password = "";
    
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host.":3306" .";dbname=" . $this->db_name, $this->username, $this->password);

            // $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            print("exitt");
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>