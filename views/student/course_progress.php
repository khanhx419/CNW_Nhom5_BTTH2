<?php
// An toàn biến
$progress = $progress ?? 0;
$lessons  = $lessons  ?? [];
?>

<?php 
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/course_progress.css">';
include __DIR__ . '/../layouts/header.php'; ?>

<div class="progress-page">

    <h3>📈 Tiến độ học tập</h3>

    <p class="progress-info">
        Tiến độ hiện tại: <?= (int)$progress ?>%
    </p>

    <div class="progress-track">
        <div class="progress-fill" style="width: <?= (int)$progress ?>%;">
            <?= (int)$progress ?>%
        </div>
    </div>

    <div class="lesson-section">
        <h5>📚 Danh sách bài học</h5>

        <?php if (empty($lessons)): ?>
            <p class="empty-lessons">Chưa có bài học nào.</p>
        <?php else: ?>
            <ul class="lesson-list">
                <?php foreach ($lessons as $lesson): ?>
                    <li><?= htmlspecialchars($lesson['title']) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <a href="index.php?url=student/dashboard" class="btn-back">
        ← Quay lại khóa học của tôi
    </a>

</div>


<?php include __DIR__ . '/../layouts/footer.php'; ?>
