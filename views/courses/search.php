<?php
// an toàn dữ liệu
$keyword = $_GET['keyword'] ?? '';
$courses = $courses ?? [];
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Kết quả tìm kiếm: "<?= htmlspecialchars($keyword) ?>"</h2>

<?php if (empty($courses)): ?>
    <p>Không tìm thấy khóa học nào.</p>
<?php else: ?>
    <div class="course-list">
        <?php foreach ($courses as $c): ?>
            <div class="course-item">
                <img src="assets/uploads/courses/<?= htmlspecialchars($c['image']) ?>" width="150">

                <h3><?= htmlspecialchars($c['title']) ?></h3>

                <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>">
                    Xem chi tiết
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
