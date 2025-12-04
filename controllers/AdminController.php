<?php
require_once 'models/User.php';

class AdminController {
    
    // Kiểm tra xem có phải admin không
    private function checkAdmin() {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
            header("Location: /CNW/CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
    }

    public function dashboard() {
        $this->checkAdmin();
        include 'views/admin/dashboard.php';
    }

    public function users() {
        $this->checkAdmin();
        
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
        
        // Gọi hàm readAll vừa viết ở Model
        $stmt = $user->readAll();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Truyền biến $users sang view
        include 'views/admin/users/manage.php';
    }
}
?>