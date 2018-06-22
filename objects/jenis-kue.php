<?php
class JenisKue{

    // database connection and table name
    private $conn;
    private $table_name = "jenis_kue";

    // object properties
    public $jenis_kue_id;
    public $jenis_kue;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT
                    jenis_kue_id, jenis_kue
                FROM
                    " . $this->table_name . "
                ORDER BY
                    jenis_kue_id";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        
        return $stmt;
    }
}    
?>