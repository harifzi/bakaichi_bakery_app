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

    // Read All
    public function readAll($from_record_num, $records_per_page)
    {
        $query = "SELECT
                    order_item.order_item_id, order.invoice_id, order.order_id, kue.nama_kue, order_item.total_order, jenis_kue.jenis_kue, order.order_created_at, user.nama_depan, user.nama_belakang, user.email
                FROM
                    ".$this->table_name."
                INNER JOIN `order` ON (order_item.order_id = `order`.order_id) INNER JOIN kue ON (order_item.kue_id = kue.kue_id) INNER JOIN jenis_kue ON (kue.jenis_kue_id = jenis_kue.jenis_kue_id) INNER JOIN user ON (`order`.user_id = user.user_id) ORDER BY `order`.order_created_at LIMIT ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;   
    }

    public function readByOrder()
    {
        $query = "SELECT
                    order_item.order_item_id, order.order_id, order.invoice_id, kue.nama_kue, kue.harga_kue, jenis_kue.jenis_kue, order_item.total_order, order.order_created_at
                FROM
                    " . $this->table_name . "
                INNER JOIN `order` ON (order_item.order_id = `order`.order_id) INNER JOIN kue ON (order_item.kue_id = kue.kue_id) INNER JOIN jenis_kue ON (kue.jenis_kue_id = jenis_kue.jenis_kue_id) WHERE
                    order_item.order_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->order_id);
        
        $stmt->execute();

        return $stmt;
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r(json_encode($row));
        // $this->deskripsi_kue = $row['deskripsi_kue'];
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