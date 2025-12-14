<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/manage_user.css">';

include 'views/layouts/header.php'; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="bi bi-people-fill"></i> Quản Lý Người Dùng</h2>
        <a href="/CNW_Nhom5_BTTH2/admin/dashboard" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại Dashboard
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Họ và Tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td> <td><?php echo $user['email']; ?></td>
                        <td>
                            <?php 
                            if ($user['role'] == 2) echo '<span class="badge bg-danger">Admin</span>';
                            elseif ($user['role'] == 1) echo '<span class="badge bg-primary">Giảng viên</span>';
                            else echo '<span class="badge bg-success">Học viên</span>';
                            ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Sửa</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?');"><i class="bi bi-trash"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>