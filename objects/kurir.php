<?php
class Kurir{

    private $conn;
    private $table_name = "kurir";

    public $kurir_id;
    public $kurir;
    public $biaya_kurir;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $query = "SELECT
                    kurir_id, kurir, biaya_kurir
                FROM
                    " . $this->table_name . "
                ORDER BY
                    kurir_id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}    
?>