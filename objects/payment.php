<?php
class Payment{

    private $conn;
    private $table_name = "payment";

    public $payment_id;
    public $user_id;
    public $total_payment;
    public $status_payment;
    public $payment_expired_at;

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
                    payment_id=:payment_id, user_id=:user_id, total_payment=:total_payment, status_payment=:status_payment, payment_expired_at=:payment_expired_at";

        $stmt = $this->conn->prepare($query);

        $this->payment_id=htmlspecialchars(strip_tags($this->payment_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->total_payment=htmlspecialchars(strip_tags($this->total_payment));
        $this->status_payment=htmlspecialchars(strip_tags($this->status_payment));
        $this->payment_expired_at=htmlspecialchars(strip_tags($this->payment_expired_at));
        
        $stmt->bindParam(":payment_id", $this->payment_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":total_payment", $this->total_payment);
        $stmt->bindParam(":status_payment", $this->status_payment);
        $stmt->bindParam(":payment_expired_at", $this->payment_expired_at);
        
        if($stmt->execute())
        {
            echo '(:';
            return true;
        }
        else
        {
            echo '):';
            return false;
        }     
    }
}    
?>