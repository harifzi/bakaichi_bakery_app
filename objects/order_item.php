<?php
class OrderItem{

    private $conn;
    private $table_name = "order_item";

    public $order_item_id;
    public $order_id;
    public $kue_id;
    public $total_order;

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
                    order_item_id=:order_item_id, order_id=:order_id, kue_id=:kue_id, total_order=:total_order";

        $stmt = $this->conn->prepare($query);

        $this->order_item_id=htmlspecialchars(strip_tags($this->order_item_id));
        $this->order_id=htmlspecialchars(strip_tags($this->order_id));
        $this->kue_id=htmlspecialchars(strip_tags($this->kue_id));
        $this->total_order=htmlspecialchars(strip_tags($this->total_order));
        
        $stmt->bindParam(":order_item_id", $this->order_item_id);
        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":kue_id", $this->kue_id);
        $stmt->bindParam(":total_order", $this->total_order);
        
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