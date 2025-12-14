<?php
$course     = $course ?? [];
$lessons    = $lessons ?? [];
$isEnrolled = $isEnrolled ?? false;

$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/detail.css">';
include __DIR__ . '/../layouts/header.php';
?>

<div class="course-detail-container">

<?php if (empty($course)): ?>

    <div class="enrolled-alert">
        Không tìm thấy khóa học.
    </div>

<?php else: ?>

    <h3 class="course-detail-title">
        <?= htmlspecialchars($course['title']) ?>
    </h3>

    <img src="/CNW_Nhom5_BTTH2/assets/<?= htmlspecialchars($course['image']) ?>"
         alt="Course image"
         class="course-detail-image">

    <div class="course-info">
        <p><strong>Mô tả:</strong> <?= htmlspecialchars($course['description']) ?></p>
        <p><strong>Thời lượng:</strong> <?= htmlspecialchars($course['duration_weeks']) ?> tuần</p>
        <p><strong>Mức độ:</strong> <?= htmlspecialchars($course['level']) ?></p>
        <p><strong>Giá:</strong> <?= number_format($course['price']) ?> VND</p>
    </div>

    <div class="course-actions">
        <?php if (!$isEnrolled): ?>
            <a href="index.php?controller=Student&action=enroll&id=<?= $course['id'] ?>"
               class="btn-primary-custom">
                Đăng ký khóa học
            </a>
        <?php else: ?>
            <div class="enrolled-alert">
                Bạn đã đăng ký khóa học này.
            </div>
        <?php endif; ?>
    </div>

    <h5 class="lesson-title">📚 Danh sách bài học</h5>

    <?php if (empty($lessons)): ?>
        <p class="text-muted">Chưa có bài học nào.</p>
    <?php else: ?>
        <ul class="lesson-list">
            <?php foreach ($lessons as $lesson): ?>
                <li class="lesson-item">
                    <?= htmlspecialchars($lesson['title']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="index.php?url=student/dashboard"
        class="back-btn">
        ← Quay lại Dashboard
    </a>

<?php endif; ?>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
