<?php
require_once 'models/User.php';

class AuthController {
    
    // Xử lý Đăng ký
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $database = new Database();
            $db = $database->getConnection();
            $user = new User($db);

            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password']; // Sẽ được mã hóa trong Model
            $user->fullname = $_POST['fullname'];
            $user->role = 0; // Mặc định đăng ký là Học viên (0)

            if ($user->register()) {
                // Đăng ký thành công -> Chuyển hướng về login
                header("Location: /CNW/CNW_Nhom5_BTTH2/auth/login");
            } else {
                $error = "Đăng ký thất bại. Email hoặc Username có thể đã tồn tại.";
                require_once 'views/auth/register.php';
            }
        } else {
            require_once 'views/auth/register.php';
        }
    }

    // Xử lý Đăng nhập (Cập nhật Phân quyền)
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $database = new Database();
            $db = $database->getConnection();
            $userModel = new User($db);

            $user = $userModel->login($email, $password);

            if ($user) {
                // Lưu session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['fullname'];
                $_SESSION['user_role'] = $user['role'];

                // PHÂN QUYỀN CHUYỂN HƯỚNG [cite: 100]
                if ($user['role'] == 2) {
                    header("Location: /CNW/CNW_Nhom5_BTTH2/admin/dashboard"); // Admin
                } elseif ($user['role'] == 1) {
                    header("Location: /CNW/CNW_Nhom5_BTTH2/instructor/dashboard"); // Giảng viên
                } else {
                    header("Location: /CNW/CNW_Nhom5_BTTH2/student/dashboard"); // Học viên
                }
                exit();
            } else {
                $error = "Email hoặc mật khẩu không đúng!";
                require_once 'views/auth/login.php';
            }
        } else {
            require_once 'views/auth/login.php';
        }
    }

    // Đăng xuất
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /CNW/CNW_Nhom5_BTTH2/auth/login");
        exit();
    }
}
?>