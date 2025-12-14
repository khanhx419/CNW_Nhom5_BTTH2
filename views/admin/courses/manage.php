<?php
// Bảo vệ quyền admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header("Location: /CNW_Nhom5_BTTH2/auth/login");
    exit();
}

// An toàn biến
$courses = $courses ?? [];

include 'views/layouts/header.php';
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📚 Quản lý khóa học</h2>
        <a href="/CNW_Nhom5_BTTH2/admin/addCourse" class="btn btn-success">
            ➕ Thêm khóa học
        </a>
    </div>

    <?php if (empty($courses)): ?>
        <div class="alert alert-info">
            Chưa có khóa học nào.
        </div>
    <?php else: ?>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="60">ID</th>
                    <th>Tiêu đề</th>
                    <th width="120">Giá</th>
                    <th width="120">Mức độ</th>
                    <th width="160">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $c): ?>
                    <tr>
                        <td><?= $c['id'] ?></td>
                        <td><?= htmlspecialchars($c['title']) ?></td>
                        <td><?= number_format($c['price']) ?> VND</td>
                        <td><?= htmlspecialchars($c['level']) ?></td>
                        <td>
                            <a href="/CNW_Nhom5_BTTH2/admin/editCourse?id=<?= $c['id'] ?>"
                               class="btn btn-warning btn-sm">
                                ✏️ Sửa
                            </a>

                            <a href="/CNW_Nhom5_BTTH2/admin/deleteCourse?id=<?= $c['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">
                                🗑️ Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</div>

<?php include 'views/layouts/footer.php'; ?>
