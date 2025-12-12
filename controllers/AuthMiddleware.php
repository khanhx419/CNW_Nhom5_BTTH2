<?php
class AuthMiddleware {

    private static function ensureSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function requireStudent() {
        self::ensureSession();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 0) {
            header("Location: /CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
    }

    public static function requireInstructor() {
        self::ensureSession();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
            header("Location: /CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
    }

    public static function requireAdmin() {
        self::ensureSession();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
            header("Location: /CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
    }
}
?>
