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

    // Read All
    public function readAll($from_record_num, $records_per_page)
    {

        // please make sure, your database name correct^^
        $query = "SELECT
                    invoice.invoice_id, invoice.invoice_created_at, user.nama_depan, user.nama_belakang, user.email, payment.total_payment, payment.status_payment, shipping.status_shipping, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN `3bakaichi_bakery_app`.user ON (invoice.user_id = user.user_id) INNER JOIN `3bakaichi_bakery_app`.order ON (order.invoice_id = invoice.invoice_id) AND (order.user_id = user.user_id) INNER JOIN `3bakaichi_bakery_app`.payment ON (payment.user_id = user.user_id) AND (order.payment_id = payment.payment_id) INNER JOIN `3bakaichi_bakery_app`.shipping ON (shipping.invoice_id = invoice.invoice_id) AND (shipping.order_id = order.order_id) ORDER BY invoice_created_at ASC LIMIT ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;   
    }

    // Count All
    public function countAll()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }
}    
?>