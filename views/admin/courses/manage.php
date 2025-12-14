<?php
// 1. Bảo vệ quyền admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header("Location: /CNW_Nhom5_BTTH2/auth/login");
    exit();
}

// 2. Đảm bảo $courses là mảng
$courses = $courses ?? [];
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/manage_admin.css">';

// 3. Giới hạn tối đa 4 khóa học
$maxCourses = 4;
$totalCourses = count($courses);
$courses = array_slice($courses, 0, $maxCourses);

include 'views/layouts/header.php';
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">📚 Quản lý khóa học (tối đa 4 môn)</h2>

        <?php if ($totalCourses < $maxCourses): ?>
            <a href="/CNW_Nhom5_BTTH2/admin/addCourse" class="btn btn-success">
                ➕ Thêm khóa học
            </a>
        <?php else: ?>
            <button class="btn btn-secondary" disabled>
                🚫 Đã đủ 4 khóa học
            </button>
        <?php endif; ?>
    </div>

    <?php if (empty($courses)): ?>
        <div class="alert alert-warning">
            Chưa có khóa học nào.
        </div>
    <?php else: ?>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên khóa học</th>
                            <th>Giá (VNĐ)</th>
                            <th>Mức độ</th>
                            <th width="220">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $c): ?>
                            <tr>
                                <td><?= $c['id'] ?></td>
                                <td><?= htmlspecialchars($c['title']) ?></td>
                                <td><?= number_format($c['price'], 0, ',', '.') ?></td>
                                <td>
                                    <span class="badge bg-info">
                                        <?= htmlspecialchars($c['level']) ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="/CNW_Nhom5_BTTH2/admin/editCourse?id=<?= $c['id'] ?>"
                                       class="btn btn-warning btn-sm">
                                        ✏️ Sửa
                                    </a>

                                    <a href="/CNW_Nhom5_BTTH2/admin/deleteCourse?id=<?= $c['id'] ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Xóa khóa học này?')">
                                        🗑️ Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
