<?php
class Order{

    private $conn;
    private $table_name = "`order`";

    public $order_id;
    public $payment_id;
    public $alamat_id;
    public $user_id;
    public $invoice_id;
    public $payment_confirmation_id;
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
                    order_id=:order_id, payment_id=:payment_id, alamat_id=:alamat_id, user_id=:user_id, invoice_id=:invoice_id, payment_confirmation_id=:payment_confirmation_id";

        $stmt = $this->conn->prepare($query);

        $this->order_id=htmlspecialchars(strip_tags($this->order_id));
        $this->payment_id=htmlspecialchars(strip_tags($this->payment_id));
        $this->alamat_id=htmlspecialchars(strip_tags($this->alamat_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->invoice_id=htmlspecialchars(strip_tags($this->invoice_id));
        $this->payment_confirmation_id=htmlspecialchars(strip_tags($this->payment_confirmation_id));
        
        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":payment_id", $this->payment_id);
        $stmt->bindParam(":alamat_id", $this->alamat_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        $stmt->bindParam(":payment_confirmation_id", $this->payment_confirmation_id);
        
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }     
    }
    
    public function readAllPayment($from_record_num, $records_per_page)
    {
        $query = "SELECT
                    payment.payment_id, order.invoice_id, order.order_id, user.nama_depan, user.nama_belakang, user.email, user.telepon, payment.total_payment, payment.status_payment, payment_confirmation.gambar_payment_confirmation, payment.payment_expired_at, order.order_created_at
                FROM
                    ".$this->table_name."
                INNER JOIN payment ON order.payment_id = payment.payment_id INNER JOIN user ON (payment.user_id = user.user_id) AND (order.user_id = user.user_id) INNER JOIN payment_confirmation ON (payment_confirmation.user_id = user.user_id) AND (payment_confirmation.payment_confirmation_id = order.payment_confirmation_id) ORDER BY order_created_at DESC
                LIMIT
                    ?, ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt;
    }

    public function readAllPaymentToVerify($from_record_num, $records_per_page, $now)
    {
        $query = "SELECT
                    payment.payment_id, order.invoice_id, order.order_id, order.payment_confirmation_id, user.nama_depan, user.nama_belakang, user.email, user.telepon, payment_confirmation.tanggal_transaksi, payment_confirmation.nomor_bank, payment_confirmation.atas_nama, payment.total_payment, payment_confirmation.jumlah, payment_confirmation.gambar_payment_confirmation, payment.payment_expired_at, order.order_created_at
                FROM
                    ".$this->table_name."
                INNER JOIN payment ON (`order`.payment_id = payment.payment_id) INNER JOIN user ON (payment.user_id = user.user_id) AND (`order`.user_id = user.user_id) INNER JOIN payment_confirmation ON (payment_confirmation.payment_confirmation_id = `order`.payment_confirmation_id) AND (payment_confirmation.user_id = user.user_id) WHERE NOT payment_confirmation.gambar_payment_confirmation = '' AND payment.status_payment = 0 AND payment.payment_expired_at >= ?  
                LIMIT
                    ?, ?";

        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(1, $now, PDO::PARAM_STR);
        $stmt->bindParam(2, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(3, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt;
    }

    public function countAll()
    {
        $query = "SELECT COUNT(*) as total_rows FROM ".$this->table_name."";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row["total_rows"];
    }
}    
?>