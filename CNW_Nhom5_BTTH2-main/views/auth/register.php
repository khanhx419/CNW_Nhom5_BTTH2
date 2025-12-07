<?php include 'views/layouts/header.php'; ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h3>Đăng Ký Tài Khoản</h3>
            </div>
            <div class="card-body">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form action="/CNW/CNW_Nhom5_BTTH2/auth/register" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập (Username)</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Đăng ký ngay</button>
                </form>
            </div>
            <div class="card-footer text-center">
                Đã có tài khoản? <a href="/CNW/CNW_Nhom5_BTTH2/auth/login">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>