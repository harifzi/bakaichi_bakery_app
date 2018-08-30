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
        
        $stmt->bindParam(":invoice_id", $this->invoice_id);
        $stmt->bindParam(":user_id", $this->user_id);
        
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
                    invoice.invoice_id, invoice.invoice_created_at, user.nama_depan, user.nama_belakang, user.email, payment.total_payment, payment.status_payment, shipping.status_shipping, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN user ON (invoice.user_id = user.user_id) INNER JOIN `order` ON (order.invoice_id = invoice.invoice_id) AND (order.user_id = user.user_id) INNER JOIN payment ON (payment.user_id = user.user_id) AND (order.payment_id = payment.payment_id) INNER JOIN shipping ON (shipping.invoice_id = invoice.invoice_id) AND (shipping.order_id = order.order_id) ORDER BY invoice_created_at DESC LIMIT ?, ?";

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

    public function readLatestInvoice()
    {
        $query = "SELECT
                    invoice.invoice_id, payment_confirmation.gambar_payment_confirmation
                FROM
                    ".$this->table_name."
                INNER JOIN `order` ON (invoice.user_id = `order`.user_id) INNER JOIN payment ON (`order`.payment_id = payment.payment_id) AND (invoice.user_id = payment.user_id) INNER JOIN payment_confirmation ON (`order`.payment_confirmation_id = payment_confirmation.payment_confirmation_id) AND (invoice.user_id = payment_confirmation.user_id) WHERE invoice.user_id = ? AND payment.status_payment = 0 AND invoice.invoice_created_at <= ? AND payment.payment_expired_at > ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->user_id,PDO::PARAM_STR);
        $stmt->bindParam(2, $this->now, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->now, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->invoice_id = $row['invoice_id'];
        $this->gambar_payment_confirmation = $row['gambar_payment_confirmation'];
        return true;
    }

    public function readOneDetail()
    {
        $query = "SELECT
                    invoice.invoice_id, order.order_id, payment.payment_id, shipping.shipping_id, payment_confirmation.payment_confirmation_id, user.nama_depan, user.nama_belakang, user.telepon, user.email, alamat.alamat_val, alamat.kodepos, kurir.kurir, kurir.biaya_kurir, payment.total_payment, payment_confirmation.tanggal_transaksi, payment_confirmation.nomor_bank, payment_confirmation.atas_nama, payment_confirmation.jumlah, payment_confirmation.gambar_payment_confirmation, payment.status_payment, shipping.status_shipping, invoice.invoice_created_at, payment.payment_expired_at
                FROM
                    ".$this->table_name."
                INNER JOIN user ON (invoice.user_id = user.user_id) INNER JOIN `order` ON (`order`.invoice_id = invoice.invoice_id) AND (`order`.user_id = user.user_id) INNER JOIN alamat ON (alamat.user_id = user.user_id) AND (alamat.alamat_id = `order`.alamat_id) INNER JOIN payment ON (payment.user_id = user.user_id) AND (order.payment_id = payment.payment_id) INNER JOIN shipping ON (shipping.invoice_id = invoice.invoice_id) AND (shipping.order_id = `order`.order_id) INNER JOIN kurir ON (shipping.kurir_id = kurir.kurir_id) INNER JOIN payment_confirmation ON (payment_confirmation.user_id = user.user_id) AND (order.payment_confirmation_id = payment_confirmation.payment_confirmation_id) WHERE
                    invoice.invoice_id = ?
                LIMIT
                    0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->invoice_id,PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->invoice_id = $row['invoice_id'];
        $this->order_id = $row['order_id'];
        $this->payment_id = $row['payment_id'];
        $this->shipping_id = $row['shipping_id'];
        $this->nama_depan = $row['nama_depan'];
        $this->nama_belakang = $row['nama_belakang'];
        $this->telepon = $row['telepon'];
        $this->email = $row['email'];
        $this->alamat_val = $row['alamat_val'];
        $this->kodepos = $row['kodepos'];
        $this->kurir = $row['kurir'];
        $this->biaya_kurir = $row['biaya_kurir'];
        $this->total_payment = $row['total_payment'];
        $this->status_payment = $row['status_payment'];
        $this->status_shipping = $row['status_shipping'];
        $this->invoice_created_at = $row['invoice_created_at'];
        $this->payment_expired_at = $row['payment_expired_at'];
        $this->payment_confirmation_id = $row['payment_confirmation_id'];
        $this->tanggal_transaksi=$row["tanggal_transaksi"];
        $this->nomor_bank=$row["nomor_bank"];
        $this->atas_nama=$row["atas_nama"];
        $this->jumlah=$row["jumlah"];
        $this->gambar_payment_confirmation=$row["gambar_payment_confirmation"];
        return true;
    }
}    
?>