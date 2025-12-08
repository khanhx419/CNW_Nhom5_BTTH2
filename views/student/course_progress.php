<?php include 'views/layouts/header.php'; ?>

<h2>Tiến độ học tập</h2>

<p><b>Tiến độ hiện tại:</b> 
    <?= $progress['progress'] ?? 0 ?>%
</p>

<h3>Danh sách bài học</h3>

<ul>
<?php foreach ($lessons as $lesson): ?>
    <li><?php echo $lesson['title']; ?></li>
<?php endforeach; ?>
</ul>

<a href="index.php?controller=Student&action=my_courses_full">
    Quay lại khóa học của tôi
</a>

<?php include 'views/layouts/footer.php'; ?>
