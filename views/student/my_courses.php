<?php include 'views/layouts/header.php'; ?>

<h2>Khóa học đã đăng ký</h2>

<?php if (empty($courses)): ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php endif; ?>

<div class="course-list">
    <?php foreach ($courses as $c): ?>
        <div class="course-item">
            <h3><?php echo $c['title']; ?></h3>
            <p>Tiến độ: <?php echo $c['progress']; ?>%</p>

            <a href="index.php?controller=Student&action=progress&id=<?= $c['id'] ?>">
                Theo dõi tiến độ
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
