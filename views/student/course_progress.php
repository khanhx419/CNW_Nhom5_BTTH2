<?php
// an toàn dữ liệu
$progress = $progress ?? [];
$lessons  = $lessons  ?? [];
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Tiến độ học tập</h2>

<p>
    <b>Tiến độ hiện tại:</b>
    <?= htmlspecialchars($progress['progress'] ?? 0) ?>%
</p>

<h3>Danh sách bài học</h3>

<?php if (empty($lessons)): ?>
    <p>Chưa có bài học nào.</p>
<?php else: ?>
    <ul>
        <?php foreach ($lessons as $lesson): ?>
            <li><?= htmlspecialchars($lesson['title']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="index.php?controller=Student&action=my_courses_full">
    Quay lại khóa học của tôi
</a>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
