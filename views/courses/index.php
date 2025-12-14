<?php
// An toàn biến
$courses = $courses ?? [];
$keyword = $_GET['keyword'] ?? '';
?>

<?php
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/courses_index.css">';

include __DIR__ . '/../layouts/header.php'; ?>

<div class="container mt-4">

    <h3 class="mb-3">📚 Danh sách khóa học</h3>

    <!-- FORM TÌM KIẾM -->
    <form method="GET" action="index.php" class="mb-4">
        <input type="hidden" name="controller" value="Student">
        <input type="hidden" name="action" value="search">

        <div class="input-group">
            <input type="text"
                   name="keyword"
                   class="form-control"
                   placeholder="Nhập tên khóa học..."
                   value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-primary" type="submit">Tìm</button>
        </div>
    </form>

    <?php if (empty($courses)): ?>
        <div class="alert alert-info">
            Hiện chưa có khóa học nào.
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($courses as $c): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <img src="assets/uploads/courses/<?= htmlspecialchars($c['image']) ?>"
                             class="card-img-top"
                             style="max-height:180px;object-fit:cover;">

                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($c['title']) ?>
                            </h5>

                            <p class="card-text">
                                <?= htmlspecialchars(mb_substr($c['description'], 0, 100)) ?>...
                            </p>

                            <a href="index.php?controller=Student&action=detail&id=<?= $c['id'] ?>"
                               class="btn btn-outline-primary btn-sm">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
