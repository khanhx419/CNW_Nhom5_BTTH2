<?php
// Kiểm tra quyền admin trước!!!
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header("Location: /CNW_Nhom5_BTTH2/auth/login");
    exit();
}

// Truyền CSS riêng vào header
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/admin.css">';

include 'views/layouts/header.php';
?>


<div class="container mt-4">

    <div class="alert alert-primary">
        <h3 class="mb-0">🎉 Chào mừng Admin, <?php echo $_SESSION['user_name']; ?>!</h3>
        <small>Trang quản trị hệ thống khóa học</small>
    </div>

    <div class="row mt-4">
        
        <!-- Quản lý người dùng -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>👤 Người dùng</h4>
                    <p>Quản lý tài khoản học viên và giảng viên.</p>
                    <a href="/CNW_Nhom5_BTTH2/admin/users" class="btn btn-primary">Quản lý</a>
                </div>
            </div>
        </div>

        <!-- Quản lý khóa học -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>📚 Khóa học</h4>
                    <p>Thêm, sửa, xóa khóa học.</p>
                    <a href="#" class="btn btn-success">Xem khóa học</a>
                </div>
            </div>
        </div>

        <!-- Đăng xuất -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>🚪 Đăng xuất</h4>
                    <p>Kết thúc phiên làm việc quản trị.</p>
                    <a href="/CNW_Nhom5_BTTH2/auth/logout" class="btn btn-danger">Đăng xuất</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>
