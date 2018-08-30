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

    public function readAll($from_record_num, $records_per_page)
    {
        $query = "SELECT
                    shipping.shipping_id, user.nama_depan, user.nama_belakang, alamat.alamat_val, alamat.kodepos, user.email, user.telepon, kurir.kurir, order.invoice_id, kurir.biaya_kurir, shipping.status_shipping, payment.status_payment, order.order_created_at, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN `order` ON (shipping.order_id = `order`.order_id) INNER JOIN user ON (`order`.user_id = user.user_id) INNER JOIN alamat ON (alamat.user_id = user.user_id) AND (alamat.alamat_id = `order`.alamat_id) INNER JOIN kurir ON (shipping.kurir_id = kurir.kurir_id) INNER JOIN payment ON (payment.user_id = user.user_id) AND (`order`.payment_id = payment.payment_id) ORDER BY
                order_created_at DESC, status_shipping ASC, status_payment DESC LIMIT ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;   
    }

    public function shippingReady($from_record_num, $records_per_page)
    {
        $query = "SELECT
                    shipping.shipping_id, user.nama_depan, user.nama_belakang, alamat.alamat_val, alamat.kodepos, user.email, user.telepon, kurir.kurir, order.invoice_id, kurir.biaya_kurir, shipping.status_shipping, payment.status_payment, order.order_created_at, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN `order` ON (shipping.order_id = `order`.order_id) INNER JOIN user ON (`order`.user_id = user.user_id) INNER JOIN alamat ON (alamat.user_id = user.user_id) AND (alamat.alamat_id = `order`.alamat_id) INNER JOIN kurir ON (shipping.kurir_id = kurir.kurir_id) INNER JOIN payment ON (payment.user_id = user.user_id) AND (`order`.payment_id = payment.payment_id) WHERE
                status_payment = 1 AND status_shipping = 0 ORDER BY order_created_at DESC, status_shipping ASC, status_payment DESC
                LIMIT
                ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;   
    }

    public function readOne()
    {
        $query = "SELECT
                    user.nama_depan, user.nama_belakang, user.alamat, user.kode_pos, user.email, user.telepon, kurir.kurir, order.invoice_id, kurir.biaya_kurir, shipping.status_shipping, payment.status_payment, order.order_created_at, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN `order` ON (shipping.order_id = order.order_id) INNER JOIN user ON (order.user_id = user.user_id) INNER JOIN kurir ON (shipping.kurir_id = kurir.kurir_id) INNER JOIN payment ON (payment.user_id = user.user_id) AND (order.payment_id = payment.payment_id) WHERE
                    shipping_id=".$this->shipping_id."
                LIMIT
                    0,1";

        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(1, $this->shipping_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nama_depan = $row['nama_depan'];
        $this->nama_belakang = $row['nama_belakang'];
        $this->alamat = $row['alamat'];
        $this->kode_pos = $row['kode_pos'];
        $this->email = $row['email'];
        $this->telepon = $row['telepon'];
        $this->kurir = $row['kurir'];
        $this->invoice_id = $row['invoice_id'];
        $this->biaya_kurir = $row['biaya_kurir'];
        $this->status_shipping = $row['status_shipping'];
        $this->status_payment = $row['status_payment'];
        $this->order_created_at = $row['order_created_at'];
        $this->payment_expired_at = $row['payment_expired_at'];
    }

    public function countAll()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        return $row['total_rows'];
    }

    public function verifyStatus()
    {
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    status_shipping = ?
                WHERE
                    shipping_id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->status_shipping,PDO::PARAM_INT);        
        $stmt->bindParam(2, $this->shipping_id,PDO::PARAM_STR);        
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