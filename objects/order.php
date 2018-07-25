<?php
class Order{

    private $conn;
    private $table_name = "`order`";

    public $order_id;
    public $payment_id;
    public $user_id;
    public $invoice_id;
    public $order_created_at;

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
                    order_id=:order_id, payment_id=:payment_id, user_id=:user_id, invoice_id=:invoice_id";

        $stmt = $this->conn->prepare($query);

        $this->order_id=htmlspecialchars(strip_tags($this->order_id));
        $this->payment_id=htmlspecialchars(strip_tags($this->payment_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->invoice_id=htmlspecialchars(strip_tags($this->invoice_id));
        
        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":payment_id", $this->payment_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        
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