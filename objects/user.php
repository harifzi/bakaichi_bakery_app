<?php
class User{

	private $conn;
    private $table_name = "user";

    public $user_id;
    public $username;
    public $email;
    public $password;
    public $nama_depan;
    public $nama_belakang;
    public $role;
    public $telepon;
    public $alamat;
    public $kode_pos;
    public $user_created_at;
    public $user_updated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // SignUp
    public function SignUp()
    {
		$new_password = password_hash($this->password,PASSWORD_DEFAULT);

		$query = "INSERT INTO
					".$this->table_name."
				SET
					user_id=:user_id,username=:username,email=:email,password=:password,nama_depan=:nama_depan,nama_belakang=:nama_belakang,role=:role,telepon=:telepon,alamat=:alamat,kode_pos=:kode_pos";

		$stmt = $this->conn->prepare($query);

		$this->user_id=htmlspecialchars(strip_tags($this->user_id));
        $this->username=htmlspecialchars(strip_tags($this->username));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->nama_depan=htmlspecialchars(strip_tags($this->nama_depan));
		$this->nama_belakang=htmlspecialchars(strip_tags($this->nama_belakang));
		$this->telepon=htmlspecialchars(strip_tags($this->telepon));
        $this->role=htmlspecialchars(strip_tags($this->role));
        $this->alamat=htmlspecialchars(strip_tags($this->alamat));
		$this->kode_pos=htmlspecialchars(strip_tags($this->kode_pos));

		$stmt->bindParam(":user_id",$this->user_id);
        $stmt->bindParam(":username",$this->username);
		$stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password",$new_password);
        $stmt->bindParam(":nama_depan",$this->nama_depan);
        $stmt->bindParam(":nama_belakang",$this->nama_belakang);
        $stmt->bindParam(":telepon",$this->telepon);
        $stmt->bindParam(":role",$this->role);
        $stmt->bindParam(":alamat",$this->alamat);
        $stmt->bindParam(":kode_pos",$this->kode_pos);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // User SignIn
    public function Signin()
    {
        $query = "SELECT user_id,username,email,password,role FROM ".$this->table_name." WHERE username=:username_or_email OR email=:username_or_email LIMIT 1";

        $stmt = $this->conn->prepare($query);
        
        $this->username_or_email=htmlspecialchars(strip_tags($this->username_or_email));
        $stmt->bindParam(":username_or_email",$this->username_or_email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0)
        {
            if(password_verify($this->password, $row['password']))
            {
                session_start();
                $_SESSION['session_bakaichi_bakery'] = $row['user_id'];
                $_SESSION['session_bakaichi_bakery_level'] = $row['role'];
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    // Admin SignIn
    public function AdminSignin()
    {
        $query = "SELECT user_id,username,email,password,role FROM ".$this->table_name." WHERE username=:username_or_email OR email=:username_or_email LIMIT 1";

        $stmt = $this->conn->prepare($query);
        
        $this->username_or_email=htmlspecialchars(strip_tags($this->username_or_email));
        $stmt->bindParam(":username_or_email",$this->username_or_email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0)
        {
            if(password_verify($this->password, $row['password']))
            {
                if($row['role'] == 1)
                {
                    session_start();
                    $_SESSION['session_bakaichi_bakery'] = $row['user_id'];
                    $_SESSION['session_bakaichi_bakery_level'] = $row['role'];
                    return true;
                }
                else
                {
                    echo 'fuckoff!';
                    return false;
                }
            }
        }
    }

    public function AdminAuth()
    {
        session_start();
        if($_SESSION['session_bakaichi_bakery_level'] == '1')
        {
            return true;
        }
        else
        {
            header("Location: signin.php");
            return false;
        }
    }

    // SignOut
    public function Signout()
    {
        session_start();
        session_destroy();
        unset($_SESSION["session_bakaichi_bakery"]);
        unset($_SESSION["session_bakaichi_bakery_level"]);
        return true;
    }

    // Read One
    public function readOne()
    {
        $query = "SELECT
                    user.user_id, user.nama_depan, user.nama_belakang, user.telepon, user.alamat, user.kode_pos
                FROM
                    " . $this->table_name . "
                WHERE
                    user_id = ?
                LIMIT
                    0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->user_id = $row['user_id'];
        $this->nama_depan = $row['nama_depan'];
        $this->nama_belakang = $row['nama_belakang'];
        $this->telepon = $row['telepon'];
        $this->alamat = $row['alamat'];
        $this->kode_pos = $row['kode_pos'];
    }
    
    // Read All
    public function readAll()
    {

        $query = "SELECT
                    user.user_id, user.nama_depan, user.nama_belakang, user.telepon, user.alamat, user.kode_pos
                FROM
                    " . $this->table_name . "
                ORDER BY
                    user_id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>