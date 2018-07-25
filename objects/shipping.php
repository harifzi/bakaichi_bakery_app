<?php
class Shipping{

    private $conn;
    private $table_name = "shipping";

    public $shipping_id;
    public $kurir_id;
    public $invoice_id;
    public $order_id;
    public $status_shipping;
    public $catatan;

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
                    shipping_id=:shipping_id, kurir_id=:kurir_id, invoice_id=:invoice_id, order_id=:order_id, status_shipping=:status_shipping, catatan=:catatan";

        $stmt = $this->conn->prepare($query);

        $this->shipping_id=htmlspecialchars(strip_tags($this->shipping_id));
        $this->kurir_id=htmlspecialchars(strip_tags($this->kurir_id));
        $this->invoice_id=htmlspecialchars(strip_tags($this->invoice_id));
        $this->order_id=htmlspecialchars(strip_tags($this->order_id));
        $this->status_shipping=htmlspecialchars(strip_tags($this->status_shipping));
        $this->catatan=htmlspecialchars(strip_tags($this->catatan));
        
        $stmt->bindParam(":shipping_id", $this->shipping_id);
        $stmt->bindParam(":kurir_id", $this->kurir_id);
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":status_shipping", $this->status_shipping);
        $stmt->bindParam(":catatan", $this->catatan);
        
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