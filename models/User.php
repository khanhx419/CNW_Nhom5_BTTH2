<?php
class User {
    private $conn;
    private $table = "users";

    public $id;
    public $username;
    public $email;
    public $password;
    public $fullname;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. Đăng ký tài khoản mới
    public function register() {
        $query = "INSERT INTO " . $this->table . " 
                  (username, email, password, fullname, role) 
                  VALUES (:username, :email, :password, :fullname, :role)";

        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->role = htmlspecialchars(strip_tags($this->role));

        // Mã hóa mật khẩu (Yêu cầu bắt buộc) [cite: 99]
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':role', $this->role);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // 2. Kiểm tra đăng nhập (Đã có, giữ nguyên)
    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    
    // 3. Lấy tất cả người dùng (Dùng cho trang Quản lý của Admin)
    public function readAll() {
        $query = "SELECT id, username, email, fullname, role, created_at FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>