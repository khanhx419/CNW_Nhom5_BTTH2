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
            $user->password = $_POST['password'];
            $user->fullname = $_POST['fullname'];
            $user->role = 0; // Mặc định là Học viên

            if ($user->register()) {
                header("Location: /CNW_Nhom5_BTTH2/auth/login");
                exit;
            } else {
                $error = "Đăng ký thất bại. Email hoặc Username có thể đã tồn tại.";
                require_once 'views/auth/register.php';
            }
        } else {
            require_once 'views/auth/register.php';
        }
    }

    // Xử lý Đăng nhập (Mới cập nhật)
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $database = new Database();
            $db = $database->getConnection();
            $userModel = new User($db);

            // 1. Tìm user theo email trước
            $user = $userModel->findByEmail($email);

            if ($user) {
                // 2. Kiểm tra mật khẩu
                if (password_verify($password, $user['password'])) {
                    // Đăng nhập thành công -> Lưu Session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['fullname'];
                    $_SESSION['user_role'] = $user['role'];

                    // Phân quyền chuyển hướng
                    if ($user['role'] == 2) {
                        header("Location: /CNW_Nhom5_BTTH2/admin/dashboard");
                    } elseif ($user['role'] == 1) {
                        header("Location: /CNW_Nhom5_BTTH2/instructor/dashboard");
                    } else {
                        header("Location: /CNW_Nhom5_BTTH2/student/dashboard");
                    }
                    exit();
                } else {
                    $error = "Mật khẩu không chính xác!";
                }
            } else {
                $error = "Email này chưa được đăng ký!";
            }

            require_once 'views/auth/login.php';
        } else {
            require_once 'views/auth/login.php';
        }
    }

    // Đăng xuất
    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /CNW_Nhom5_BTTH2/auth/login");
        exit();
    }
}
?>