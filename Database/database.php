
<?php

class mydatabase
{
 
    // database connection and table name
    private $conn;
    private $table_name = "LoginDB";
 
    // object properties 
   
    public $UserName;
    public $password;
    public $selectQuery;
 
    // constructor with $db as database connection
public function __construct($db)
        {
            $this->conn = $db;
            $this->selectQuery="SELECT * FROM ".$this->table_name;
 
        }
   
public function create()
        {
            //query to insert record
        
            $query = "INSERT INTO ".$this->table_name."(UserName,password)
            VALUES (:UserName,:password)";            

            // prepare query
            $stmt = $this->conn->prepare($query);
        
            $stmt->bindParam(":UserName", $this->UserName);
            $stmt->bindParam(":password", $this->password);
            if ( $stmt->execute()) {
                return true;
            }
            return false;

        }
public function login() 
            {
                $query = $this->selectQuery." WHERE UserName ='".$this->UserName."' AND password='".$this->password."'";
                // prepare query
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                return $stmt;
        }
    //search data   
public function search() 
        {
        
            $query = $this->selectQuery." WHERE UserName ='".$this->UserName."'";
            // prepare query
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    
    
}