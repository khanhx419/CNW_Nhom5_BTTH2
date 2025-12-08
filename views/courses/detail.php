<?php include 'views/layouts/header.php'; ?>

<h2><?php echo $course['title']; ?></h2>

<img src="assets/uploads/courses/<?php echo $course['image']; ?>" width="250">

<p><b>Mô tả:</b> <?php echo $course['description']; ?></p>
<p><b>Thời lượng:</b> <?php echo $course['duration_weeks']; ?> tuần</p>
<p><b>Mức độ:</b> <?php echo $course['level']; ?></p>
<p><b>Giá:</b> <?php echo $course['price']; ?> VND</p>

<a href="index.php?controller=Student&action=enroll&id=<?= $course['id'] ?>" 
   class="btn btn-primary">
   Đăng ký khóa học
</a>

<h3>Bài học</h3>

<ul>
<?php foreach ($lessons as $lesson): ?>
    <li><?php echo $lesson['title']; ?></li>
<?php endforeach; ?>
</ul>

<?php include 'views/layouts/footer.php'; ?>
