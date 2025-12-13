<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="dashboard-container">

    <!-- THÔNG BÁO ĐĂNG NHẬP -->
    <div class="alert-success custom-alert">
        <h4>Đăng nhập thành công! 🎉</h4>
        <p>Xin chào học viên, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>!</p>
        <hr>
        <p class="mb-0">Đây là trang Dashboard dành cho bạn. Tại đây bạn có thể xem, đăng ký và theo dõi tiến độ học tập.</p>
    </div>

    <!-- KHÓA HỌC CỦA TÔI -->
    <a href="index.php?url=student/my_courses_full" class="btn-link custom-link mb-3">Khóa học của tôi</a>

    <?php if (!empty($myCourses)): ?>
        <div class="courses-row">
            <?php foreach ($myCourses as $course): ?>
                <div class="course-card">
                    <div class="card-body">
                        <h6 class="card-title"><?= htmlspecialchars($course['title']) ?></h6>
                        <p>Tiến độ: <?= $course['progress'] ?>%</p>
                        <a href="index.php?url=student/progress/<?= $course['id'] ?>" class="btn btn-success">Tiếp tục học</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">Bạn chưa đăng ký khóa học nào.</p>
    <?php endif; ?>

    <hr>

    <!-- FORM TÌM KIẾM -->
    <form method="GET" action="index.php" class="search-form">
        <input type="hidden" name="url" value="student/dashboard">
        <input type="text" name="keyword" placeholder="Tìm khóa học..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
        <button type="submit">Tìm</button>
    </form>

    <!-- TẤT CẢ KHÓA HỌC -->
    <h5 class="mb-3">📚 Tất cả khóa học</h5>

    <div class="courses-row">
        <?php foreach ($allCourses as $course): ?>
            <div class="course-card">
                <div class="card-body">
                    <h6 class="card-title"><?= htmlspecialchars($course['title']) ?></h6>
                    <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                    <div class="card-buttons">
                        <a href="index.php?url=student/detail/<?= $course['id'] ?>" class="btn btn-outline">Xem chi tiết</a>
                        <a href="index.php?controller=Student&action=enroll&id=<?= $course['id'] ?>" class="btn btn-primary">
                            Đăng ký
                        </a>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="index.php?url=auth/logout" class="btn btn-logout">Đăng xuất</a>

</div>

<style>
/* Container */
.dashboard-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Alert đăng nhập */
.custom-alert {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Link khóa học của tôi */
.custom-link {
    display: inline-block;
    margin-bottom: 20px;
    color: #007bff;
    text-decoration: none;
}
.custom-link:hover {
    text-decoration: underline;
}

/* Grid khóa học */
.courses-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

/* Card khóa học */
.course-card {
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}
.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
}
.card-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    height: 180px;
}
.card-title {
    font-size: 1.1rem;
    margin-bottom: 10px;
}
.card-text {
    color: #555;
    flex-grow: 1;
}

/* Nút trong card */
.card-buttons {
    display: flex;
    gap: 10px;
}
.btn {
    padding: 8px;
    text-decoration: none;
    text-align: center;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
}
.btn-outline {
    border: 1px solid #007bff;
    color: #007bff;
}
.btn-outline:hover {
    background-color: #007bff;
    color: white;
}
.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
}
.btn-primary:hover {
    background-color: #0056b3;
}

/* Nút tiếp tục học */
.btn-success {
    background-color: #28a745;
    color: white;
    border: none;
    margin-top: auto;
}
.btn-success:hover {
    background-color: #218838;
}

/* Nút logout */
.btn-logout {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #dc3545;
    color: white;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 20px;
}
.btn-logout:hover {
    background-color: #c82333;
}

/* Form tìm kiếm */
.search-form {
    display: flex;
    margin-bottom: 30px;
}
.search-form input[type="text"] {
    flex-grow: 1;
    padding: 10px;
    border-radius: 4px 0 0 4px;
    border: 1px solid #ccc;
    outline: none;
}
.search-form button {
    padding: 10px 20px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
}
.search-form button:hover {
    background-color: #0056b3;
}
</style>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
