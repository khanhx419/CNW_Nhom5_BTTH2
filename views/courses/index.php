<?php include 'views/layouts/header.php'; ?>

<h2>Danh sách khóa học</h2>

<form method="GET" action="index.php">
    <input type="hidden" name="controller" value="Student">
    <input type="hidden" name="action" value="search">

    <input type="text" name="keyword" placeholder="Tìm khóa học..." />
    <button type="submit">Tìm</button>
</form>

<div class="course-list">
    <?php foreach ($courses as $c): ?>
        <div class="course-item">
            <img src="assets/uploads/courses/<?php echo $c['image']; ?>" width="150">
            <h3><?php echo $c['title']; ?></h3>
            <p><?php echo substr($c['description'], 0, 100); ?>...</p>

            <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>">
                Xem chi tiết
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
