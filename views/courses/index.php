<?php
// an toàn biến
$courses = $courses ?? [];
$keyword = $_GET['keyword'] ?? '';
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Danh sách khóa học</h2>

<form method="GET" action="index.php">
    <input type="hidden" name="controller" value="Student">
    <input type="hidden" name="action" value="search">

    <input type="text" name="keyword" placeholder="Tìm khóa học..."
           value="<?= htmlspecialchars($keyword) ?>">
    <button type="submit">Tìm</button>
</form>

<div class="course-list">
<?php if (empty($courses)): ?>
    <p>Chưa có khóa học nào.</p>
<?php else: ?>
    <?php foreach ($courses as $c): ?>
        <div class="course-item">
            <img src="assets/uploads/courses/<?= htmlspecialchars($c['image']) ?>" width="150">

            <h3><?= htmlspecialchars($c['title']) ?></h3>

            <p><?= htmlspecialchars(substr($c['description'], 0, 100)) ?>...</p>

            <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>">
                Xem chi tiết
            </a>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
