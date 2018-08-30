<?php
class Database{
     
    private $host = "localhost";
    private $db_name = "2bakaichi_bakery_app";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function getConnection()
    {
     
        $this->conn = null;
         
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }

    public function getTimestamp()
    {
        date_default_timezone_set('Asia/Bangkok');        
    }

}
?>