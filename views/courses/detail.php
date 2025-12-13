<?php
// An toàn dữ liệu
$course   = $course   ?? [];
$lessons  = $lessons  ?? [];
$isEnrolled = $isEnrolled ?? false;
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-4">

<?php if (empty($course)): ?>
    <div class="alert alert-danger">
        Không tìm thấy khóa học.
    </div>
<?php else: ?>

    <h3 class="mb-3"><?= htmlspecialchars($course['title']) ?></h3>

    <img src="assets/uploads/courses/<?= htmlspecialchars($course['image']) ?>"
         alt="Course image"
         class="img-fluid mb-3"
         style="max-width:300px;">

    <p><strong>Mô tả:</strong> <?= htmlspecialchars($course['description']) ?></p>
    <p><strong>Thời lượng:</strong> <?= htmlspecialchars($course['duration_weeks']) ?> tuần</p>
    <p><strong>Mức độ:</strong> <?= htmlspecialchars($course['level']) ?></p>
    <p><strong>Giá:</strong> <?= number_format($course['price']) ?> VND</p>

    <?php if (!$isEnrolled): ?>
        <a href="index.php?controller=Student&action=enroll&id=<?= $course['id'] ?>"
           class="btn btn-primary mb-4">
            Đăng ký khóa học
        </a>
    <?php else: ?>
        <div class="alert alert-success mb-4">
            Bạn đã đăng ký khóa học này.
        </div>
    <?php endif; ?>

    <h5>📚 Danh sách bài học</h5>

    <?php if (empty($lessons)): ?>
        <p class="text-muted">Chưa có bài học nào.</p>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($lessons as $lesson): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($lesson['title']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php?controller=Student&action=dashboard"
       class="btn btn-secondary">
        ← Quay lại Dashboard
    </a>

<?php endif; ?>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
