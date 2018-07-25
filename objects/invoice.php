<?php
class Invoice{

    private $conn;
    private $table_name = "invoice";

    public $invoice_id;
    public $user_id;
    public $invoice_created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

     // Create
    public function Create()
    {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    invoice_id=:invoice_id, user_id=:user_id";

        $stmt = $this->conn->prepare($query);

        $this->invoice_created_at=htmlspecialchars(strip_tags($this->invoice_created_at));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        // $this->invoice_created_at=htmlspecialchars(strip_tags($this->invoice_created_at));
        
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        $stmt->bindParam(":user_id", $this->user_id);
        // $stmt->bindParam(":invoice_created_at", $this->invoice_created_at);
        
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }     
    }
}    
?>