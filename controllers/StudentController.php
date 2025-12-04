<?php
class StudentController {
    public function dashboard() {
        // Kiểm tra quyền truy cập (chỉ cho học viên)
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header("Location: /CNW/CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
        
        include 'views/student/dashboard.php';
    }

    public function my_courses() {
        include 'views/student/my_courses.php';
    }
}
?>