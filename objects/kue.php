<?php
class Kue{

    // database connection and table name
    private $conn;
    private $table_name = "kue";

    // object properties
    public $kue_id;
    public $jenis_kue_id;
    public $nama_kue;
    public $harga_kue;
    public $gambar_kue;
    public $deskripsi_kue;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // Create
    function create(){

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    jenis_kue_id=:jenis_kue_id, nama_kue=:nama_kue, harga_kue=:harga_kue, gambar_kue=:gambar_kue, deskripsi_kue=:deskripsi_kue";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->jenis_kue_id=htmlspecialchars(strip_tags($this->jenis_kue_id));
        $this->nama_kue=htmlspecialchars(strip_tags($this->nama_kue));
        $this->harga_kue=htmlspecialchars(strip_tags($this->harga_kue));
        $this->gambar_kue=htmlspecialchars(strip_tags($this->gambar_kue));
        $this->deskripsi_kue=htmlspecialchars(strip_tags($this->deskripsi_kue));

        // bind values
        $stmt->bindParam(":jenis_kue_id", $this->jenis_kue_id);
        $stmt->bindParam(":nama_kue", $this->nama_kue);
        $stmt->bindParam(":harga_kue", $this->harga_kue);
        $stmt->bindParam(":gambar_kue", $this->gambar_kue);
        $stmt->bindParam(":deskripsi_kue", $this->deskripsi_kue);
        
        // execute query
        if($stmt->execute())
        {
            echo 'true';
            return true;
        }
        
        else
        {
            echo 'false';
            return false;
        }
    }

    // Read All Product
    public function readAll($from_record_num, $records_per_page){

        // select all query
        $query = "SELECT
                    kue.kue_id, kue.gambar_kue, kue.nama_kue, kue.harga_kue, jenis_kue.jenis_kue, kue.deskripsi_kue
                FROM
                    " . $this->table_name . "
                INNER JOIN jenis_kue ON kue.jenis_kue_id = jenis_kue.jenis_kue_id ORDER BY
                    kue_id DESC
                LIMIT
                    ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // Read One Product
    function readOne(){

        $query = "SELECT
                    nama_kue, jenis_kue_id, gambar_kue, harga_kue, deskripsi_kue
                FROM
                    " . $this->table_name . "
                WHERE
                    kue_id = ?
                LIMIT
                    0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->kue_id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nama_kue = $row['nama_kue'];
        $this->gambar_kue = $row['gambar_kue'];
        $this->jenis_kue_id = $row['jenis_kue_id'];
        $this->harga_kue = $row['harga_kue'];
        $this->deskripsi_kue = $row['deskripsi_kue'];
    }

    // update the product
    function update(){

        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    price = :price,
                    description = :description
                WHERE
                    id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete
    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE kue_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->kue_id);

        if($stmt->execute())
        {
            return true;
        }

        else
        {
            return false;
        }
    }
    
    // used for paging products
    public function countAll(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

}