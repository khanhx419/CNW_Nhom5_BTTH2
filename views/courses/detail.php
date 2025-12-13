<?php
// an toàn dữ liệu
$course  = $course  ?? [];
$lessons = $lessons ?? [];
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<?php if (empty($course)): ?>
    <p>Không tìm thấy khóa học.</p>
<?php else: ?>

<h2><?= htmlspecialchars($course['title']) ?></h2>

<img src="assets/uploads/courses/<?= htmlspecialchars($course['image']) ?>" width="250">

<p><b>Mô tả:</b> <?= htmlspecialchars($course['description']) ?></p>
<p><b>Thời lượng:</b> <?= htmlspecialchars($course['duration_weeks']) ?> tuần</p>
<p><b>Mức độ:</b> <?= htmlspecialchars($course['level']) ?></p>
<p><b>Giá:</b> <?= htmlspecialchars($course['price']) ?> VND</p>

<a href="index.php?controller=Student&action=enroll&id=<?= $course['id'] ?>"
   class="btn btn-primary">
   Đăng ký khóa học
</a>

<h3>Bài học</h3>

<?php if (empty($lessons)): ?>
    <p>Chưa có bài học nào.</p>
<?php else: ?>
    <ul>
        <?php foreach ($lessons as $lesson): ?>
            <li><?= htmlspecialchars($lesson['title']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php endif; ?>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
