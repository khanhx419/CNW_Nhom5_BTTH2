<?php 
$custom_css = '<link rel="stylesheet" href="/CNW_Nhom5_BTTH2/assets/css/dashboard.css">';
include __DIR__ . '/../layouts/header.php'; ?>

<div class="dashboard-bg">
    <div class="dashboard-card">

        <!-- FLASH MESSAGE (ĐĂNG KÝ / LỖI / THÀNH CÔNG) -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="custom-alert warning">
                <?= htmlspecialchars($_SESSION['message']) ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        

        <!-- THÔNG BÁO ĐĂNG NHẬP -->
        <div class="custom-alert">
            <h4>Đăng nhập thành công 🎉</h4>
            <p>Xin chào học viên, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>!</p>
            <p>Đây là trang Dashboard dành cho bạn.</p>
        </div>

        <!-- KHÓA HỌC CỦA TÔI -->
        <a href="index.php?url=student/my_courses_full" class="custom-link">
            📘 Khóa học của tôi
        </a>

        <?php if (!empty($myCourses)): ?>
            <div class="courses-row">
                <?php foreach ($myCourses as $course): ?>
                    <div class="course-card">
                        <div class="card-body">
                            <h6 class="card-title"><?= htmlspecialchars($course['title']) ?></h6>
                            <p>Tiến độ: <?= $course['progress'] ?>%</p>

                            <a href="index.php?url=student/progress&id=<?= $course['id'] ?>"
                               class="btn btn-success">
                                Tiếp tục học
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-muted">Bạn chưa đăng ký khóa học nào.</p>
        <?php endif; ?>

        <hr>

        <!-- TÌM KIẾM -->
        <form method="GET" action="index.php" class="search-form">
            <input type="hidden" name="url" value="student/dashboard">
            <input type="text" name="keyword" placeholder="Tìm khóa học...">
            <button type="submit">Tìm</button>
        </form>

        <!-- TẤT CẢ KHÓA HỌC -->
        <h5>📚 Tất cả khóa học</h5>

        <div class="courses-row">
            <?php foreach ($allCourses as $course): ?>
                <div class="course-card">
                    <div class="card-body">
                        <h6 class="card-title"><?= htmlspecialchars($course['title']) ?></h6>
                        <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>

                        <div class="card-buttons">
                            <a href="index.php?url=student/detail&id=<?= $course['id'] ?>"
                               class="btn btn-outline">
                                Chi tiết
                            </a>

                            <a href="index.php?url=student/enroll&id=<?= $course['id'] ?>"
                               class="btn btn-primary">
                                Đăng ký
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="index.php?url=auth/logout" class="btn btn-logout">Đăng xuất</a>

    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
