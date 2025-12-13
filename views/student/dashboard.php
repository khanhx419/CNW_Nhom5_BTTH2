<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/login.css">';

include 'views/layouts/header.php'; ?>

<?php 
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
    header("Location: /CNW_Nhom5_BTTH2/auth/login");
    exit();
}
?>

<div class="container mt-5">
    <div class="alert alert-success">
        <h4 class="alert-heading">Đăng nhập thành công! 🎉</h4>
        <p>Xin chào học viên, <strong><?php echo $_SESSION['user_name']; ?></strong>!</p>
        <hr>
        <p class="mb-0">Đây là trang Dashboard dành riêng cho bạn. Tại đây bạn sẽ xem được các khóa học đã đăng ký.</p>
    </div>

    <a href="/CNW_Nhom5_BTTH2/Auth/logout" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Đăng xuất
    </a>
</div>

<?php include 'views/layouts/footer.php'; ?>