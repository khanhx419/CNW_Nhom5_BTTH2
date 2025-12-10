<?php

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
    echo "Bạn không có quyền truy cập trang này.";
    exit;
}

echo "===== TRANG QUẢN LÝ GIẢNG VIÊN =====<br><br>";

echo "Xin chào, " . $_SESSION['fullname'] . "<br><br>";

echo "1. Quản lý khóa học<br>";
echo "<a href='index.php?controller=Course&action=index'>Danh sách khóa học của tôi</a><br><br>";

echo "2. Tạo khóa học mới<br>";
echo "<a href='index.php?controller=Course&action=create'>Thêm khóa học</a><br><br>";

echo "3. Xem học viên đăng ký<br>";
echo "<a href='index.php?controller=Instructor&action=students'>Danh sách học viên</a><br><br>";

echo "4. Quản lý bài học<br>";
echo "<a href='index.php?controller=Lesson&action=index'>Danh sách bài học</a><br><br>";

echo "5. Tải tài liệu lên<br>";
echo "<a href='index.php?controller=Material&action=upload'>Upload tài liệu</a><br><br>";

echo "-----------------------------<br>";
echo "<a href='index.php?controller=Auth&action=logout'>Đăng xuất</a>";
?>
