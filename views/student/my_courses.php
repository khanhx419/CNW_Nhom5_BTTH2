<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-4">

    <h3 class="mb-4">📘 Khóa học của tôi</h3>

    <?php if (empty($courses)): ?>
        <div class="alert alert-info">
            Bạn chưa đăng ký khóa học nào.
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($courses as $c): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($c['title']) ?>
                            </h5>

                            <p class="card-text">
                                Tiến độ: <strong><?= $c['progress'] ?>%</strong>
                            </p>

                            <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>"
                               class="btn btn-outline-primary btn-sm">
                                Xem chi tiết
                            </a>

                            <a href="index.php?controller=Student&action=progress&id=<?= $c['id'] ?>"
                               class="btn btn-success btn-sm">
                                Theo dõi tiến độ
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="index.php?controller=Student&action=dashboard"
       class="btn btn-secondary mt-4">
        ← Quay lại Dashboard
    </a>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
