<?php
require_once 'models/User.php';

class AdminController {
    
    // Hàm kiểm tra quyền Admin (Bảo vệ)
    // Nếu chưa đăng nhập hoặc không phải role=2 thì đuổi về trang Login
    private function checkAdmin() {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
            header("Location: /CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
    }

    // Trang Dashboard chính của Admin
    public function dashboard() {
        $this->checkAdmin(); // Kiểm tra quyền trước
        include 'views/admin/dashboard.php';
    }
    
    // Trang Quản lý người dùng
    public function users() {
        $this->checkAdmin();
        
        // Kết nối DB lấy danh sách user
        $database = new Database();
        $db = $database->getConnection();
        $userModel = new User($db);
        
        // Gọi hàm readAll() bạn đã viết trong Model User
        $stmt = $userModel->readAll();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Gửi biến $users sang View để hiển thị
        include 'views/admin/users/manage.php';
    }
}
?>