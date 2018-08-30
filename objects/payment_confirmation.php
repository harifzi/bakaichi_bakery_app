<?php
class PaymentConfirmation{

    private $conn;
    private $table_name = "payment_confirmation";

    public $payment_confirmation_id;
    public $user_id;
    public $tanggal_transaksi;
    public $nomor_bank;
    public $atas_nama;
    public $jumlah;
    public $gambar_payment_confirmation;
    public $payment_confirmation_created_at;
    public $payment_confirmation_updated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Create()
    {
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    payment_confirmation_id=:payment_confirmation_id, user_id=:user_id, tanggal_transaksi=:tanggal_transaksi, nomor_bank=:nomor_bank, atas_nama=:atas_nama, jumlah=:jumlah, gambar_payment_confirmation=:gambar_payment_confirmation, payment_confirmation_created_at=:payment_confirmation_created_at, payment_confirmation_updated_at=:payment_confirmation_updated_at";

        $stmt = $this->conn->prepare($query);

        $this->payment_confirmation_id=htmlspecialchars(strip_tags($this->payment_confirmation_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->tanggal_transaksi=htmlspecialchars(strip_tags($this->tanggal_transaksi));
        $this->nomor_bank=htmlspecialchars(strip_tags($this->nomor_bank));
        $this->atas_nama=htmlspecialchars(strip_tags($this->atas_nama));
        $this->jumlah=htmlspecialchars(strip_tags($this->jumlah));
        $this->gambar_payment_confirmation=htmlspecialchars(strip_tags($this->gambar_payment_confirmation));
        $this->payment_confirmation_created_at=htmlspecialchars(strip_tags($this->payment_confirmation_created_at));
        $this->payment_confirmation_updated_at=htmlspecialchars(strip_tags($this->payment_confirmation_updated_at));
        
        $stmt->bindParam(":payment_confirmation_id", $this->payment_confirmation_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":tanggal_transaksi", $this->tanggal_transaksi);
        $stmt->bindParam(":nomor_bank", $this->nomor_bank);
        $stmt->bindParam(":atas_nama", $this->atas_nama);
        $stmt->bindParam(":jumlah", $this->jumlah);
        $stmt->bindParam(":gambar_payment_confirmation", $this->gambar_payment_confirmation);
        $stmt->bindParam(":payment_confirmation_created_at", $this->payment_confirmation_created_at);
        $stmt->bindParam(":payment_confirmation_updated_at", $this->payment_confirmation_updated_at);
        
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }     
    }

    public function Update()
    {
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    tanggal_transaksi=:tanggal_transaksi, nomor_bank=:nomor_bank, atas_nama=:atas_nama, jumlah=:jumlah, gambar_payment_confirmation=:gambar_payment_confirmation, 
                        payment_confirmation_created_at=:payment_confirmation_created_at,
                        payment_confirmation_updated_at=:payment_confirmation_updated_at
                WHERE
                    payment_confirmation_id=:payment_confirmation_id";

        $stmt = $this->conn->prepare($query);

        $this->payment_confirmation_id=htmlspecialchars(strip_tags($this->payment_confirmation_id));
        $this->tanggal_transaksi=htmlspecialchars(strip_tags($this->tanggal_transaksi));
        $this->nomor_bank=htmlspecialchars(strip_tags($this->nomor_bank));
        $this->atas_nama=htmlspecialchars(strip_tags($this->atas_nama));
        $this->jumlah=htmlspecialchars(strip_tags($this->jumlah));
        $this->gambar_payment_confirmation=htmlspecialchars(strip_tags($this->gambar_payment_confirmation));
        $this->payment_confirmation_created_at=htmlspecialchars(strip_tags($this->payment_confirmation_created_at));
        $this->payment_confirmation_updated_at=htmlspecialchars(strip_tags($this->payment_confirmation_updated_at));
        
        $stmt->bindParam(":payment_confirmation_id", $this->payment_confirmation_id);
        $stmt->bindParam(":tanggal_transaksi", $this->tanggal_transaksi);
        $stmt->bindParam(":nomor_bank", $this->nomor_bank);
        $stmt->bindParam(":atas_nama", $this->atas_nama);
        $stmt->bindParam(":jumlah", $this->jumlah);
        $stmt->bindParam(":gambar_payment_confirmation", $this->gambar_payment_confirmation);
        $stmt->bindParam(":payment_confirmation_created_at", $this->payment_confirmation_created_at);
        $stmt->bindParam(":payment_confirmation_updated_at", $this->payment_confirmation_updated_at);
        
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