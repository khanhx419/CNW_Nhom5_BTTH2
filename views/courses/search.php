<?php include 'views/layouts/header.php'; ?>

<h2>Kết quả tìm kiếm: "<?php echo $_GET['keyword']; ?>"</h2>

<?php if (count($courses) == 0): ?>
    <p>Không tìm thấy khóa học nào.</p>
<?php endif; ?>

<div class="course-list">
    <?php foreach ($courses as $c): ?>
        <div class="course-item">
            <img src="assets/uploads/courses/<?php echo $c['image']; ?>" width="150">
            <h3><?php echo $c['title']; ?></h3>

            <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>">
                Xem chi tiết
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
