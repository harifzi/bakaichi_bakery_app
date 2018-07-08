<?php
class Kue{

    private $conn;
    private $table_name = "kue";

    public $kue_id;
    public $jenis_kue_id;
    public $nama_kue;
    public $harga_kue;
    public $gambar_kue;
    public $deskripsi_kue;
    
    public function __construct($db){
        $this->conn = $db;
    }

    // Create
    function create(){

        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    jenis_kue_id=:jenis_kue_id, nama_kue=:nama_kue, harga_kue=:harga_kue, gambar_kue=:gambar_kue, deskripsi_kue=:deskripsi_kue";

        $stmt = $this->conn->prepare($query);

        $this->jenis_kue_id=htmlspecialchars(strip_tags($this->jenis_kue_id));
        $this->nama_kue=htmlspecialchars(strip_tags($this->nama_kue));
        $this->harga_kue=htmlspecialchars(strip_tags($this->harga_kue));
        $this->gambar_kue=htmlspecialchars(strip_tags($this->gambar_kue));
        $this->deskripsi_kue=htmlspecialchars(strip_tags($this->deskripsi_kue));

        $stmt->bindParam(":jenis_kue_id", $this->jenis_kue_id);
        $stmt->bindParam(":nama_kue", $this->nama_kue);
        $stmt->bindParam(":harga_kue", $this->harga_kue);
        $stmt->bindParam(":gambar_kue", $this->gambar_kue);
        $stmt->bindParam(":deskripsi_kue", $this->deskripsi_kue);
        
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    // Read All Product
    public function readAll($from_record_num, $records_per_page){

        $query = "SELECT
                    kue.kue_id, kue.gambar_kue, kue.nama_kue, kue.harga_kue, jenis_kue.jenis_kue, kue.deskripsi_kue
                FROM
                    " . $this->table_name . "
                INNER JOIN jenis_kue ON kue.jenis_kue_id = jenis_kue.jenis_kue_id ORDER BY
                    kue_id DESC
                LIMIT
                    ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;
    }

    // Read One Product
    function readOne(){
        $query = "SELECT
                    kue.kue_id, kue.gambar_kue, kue.nama_kue, kue.harga_kue, kue.jenis_kue_id,jenis_kue.jenis_kue, kue.deskripsi_kue
                FROM
                    " . $this->table_name . "
                INNER JOIN jenis_kue ON kue.jenis_kue_id = jenis_kue.jenis_kue_id WHERE
                    kue_id = ?
                LIMIT
                    0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->kue_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nama_kue = $row['nama_kue'];
        $this->gambar_kue = $row['gambar_kue'];
        $this->harga_kue = $row['harga_kue'];
        $this->jenis_kue_id = $row['jenis_kue_id'];
        $this->jenis_kue = $row['jenis_kue'];
        $this->deskripsi_kue = $row['deskripsi_kue'];
    }

    // update the product
    function update(){

        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    jenis_kue_id=:jenis_kue_id, nama_kue=:nama_kue, harga_kue=:harga_kue, gambar_kue=:gambar_kue, deskripsi_kue=:deskripsi_kue
                WHERE
                    kue_id=:kue_id";

        $stmt = $this->conn->prepare($query);

        $this->jenis_kue_id=htmlspecialchars(strip_tags($this->jenis_kue_id));
        $this->nama_kue=htmlspecialchars(strip_tags($this->nama_kue));
        $this->harga_kue=htmlspecialchars(strip_tags($this->harga_kue));
        $this->gambar_kue=htmlspecialchars(strip_tags($this->gambar_kue));
        $this->deskripsi_kue=htmlspecialchars(strip_tags($this->deskripsi_kue));

        $stmt->bindParam(":nama_kue", $this->nama_kue);
        $stmt->bindParam(":harga_kue", $this->harga_kue);
        $stmt->bindParam(":jenis_kue_id", $this->jenis_kue_id);
        $stmt->bindParam(":gambar_kue", $this->gambar_kue);
        $stmt->bindParam(":deskripsi_kue", $this->deskripsi_kue);

        if($stmt->execute())
        {
            return true;
        }
        else {
            return false;
        }
    }

    // Delete
    function delete(){

        if(unlink($this->gambar))
        {
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
   
        else
        {
            return false;
        }
        
    }
    
    public function countAll(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

}