<?php
// An toàn biến
$progress = $progress ?? 0;
$lessons  = $lessons  ?? [];
?>

<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-4">

    <h3 class="mb-3">📈 Tiến độ học tập</h3>

    <p>
        <strong>Tiến độ hiện tại:</strong>
        <?= htmlspecialchars($progress) ?>%
    </p>

    <div class="progress mb-4" style="height: 25px;">
        <div class="progress-bar bg-success"
             role="progressbar"
             style="width: <?= (int)$progress ?>%;">
            <?= (int)$progress ?>%
        </div>
    </div>

    <h5 class="mb-3">📚 Danh sách bài học</h5>

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

    <a href="index.php?controller=Student&action=my_courses_full"
       class="btn btn-secondary">
        ← Quay lại khóa học của tôi
    </a>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
