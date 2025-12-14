<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/my_courses.css">';
include __DIR__ . '/../layouts/header.php';
?>

<div class="my-courses-container">

    <h3>📘 Khóa học của tôi</h3>

    <?php if (empty($courses)): ?>
        <div class="alert-info">
            Bạn chưa đăng ký khóa học nào.
        </div>
    <?php else: ?>
        <div class="course-grid">
            <?php foreach ($courses as $c): ?>
                <div class="course-card">
                    <h5><?= htmlspecialchars($c['title']) ?></h5>
                    <p>Tiến độ: <strong><?= $c['progress'] ?>%</strong></p>

                    <div class="course-actions">
                        <a href="index.php?url=student/detail&id=<?= $c['id'] ?>" class="btn-outline">
                            Xem chi tiết
                        </a>
                        <a href="index.php?url=student/progress&id=<?= $c['id'] ?>" class="btn-success">
                            Theo dõi tiến độ
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="index.php?url=student/dashboard" class="back-dashboard">
        ← Quay lại Dashboard
    </a>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
