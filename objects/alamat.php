<?php
class Alamat{
	private $conn;
    private $table_name = "alamat";

    public $alamat_id;
    public $alamat;
    public $kodepos;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function userSignUp()
    {
    	$query = "INSERT INTO
                    ".$this->table_name."
                SET
                    alamat_id=:alamat_id, user_id=:user_id,alamat_val=:alamat_val,kodepos=:kodepos";

        $stmt = $this->conn->prepare($query);
        $this->alamat_id=htmlspecialchars(strip_tags($this->alamat_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
        $this->kode_pos=htmlspecialchars(strip_tags($this->kode_pos));

        $stmt->bindParam(":user_id",$this->user_id);
        $stmt->bindParam(":alamat_id",$this->alamat_id);
        $stmt->bindParam(":alamat_val",$this->alamat);
        $stmt->bindParam(":kodepos",$this->kode_pos);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function readAll()
    {
        $query = "SELECT
                    alamat_id, user_id, alamat_val, kodepos
                FROM
                    ".$this->table_name."
                WHERE user_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();

        return $stmt;
    }
}
?>