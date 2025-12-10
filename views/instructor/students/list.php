<?php

// Kiểm tra biến đầu vào
if (!isset($myCourses)) {
    echo "Không có dữ liệu khóa học.";
    return;
}

echo "===== DANH SÁCH KHÓA HỌC ĐÃ ĐĂNG KÝ =====<br><br>";

// Nếu học viên chưa đăng ký khóa nào
if (empty($myCourses)) {
    echo "Bạn chưa đăng ký khóa học nào.";
    return;
}

// Hiển thị từng khóa học
foreach ($myCourses as $course) {

    echo "Tên khóa học: " . $course['title'] . "<br>";
    echo "Mô tả: " . $course['description'] . "<br>";
    echo "Tiến độ: " . $course['progress'] . "%<br>";
    echo "Trạng thái: " . $course['status'] . "<br>";

    echo "<a href='index.php?controller=Student&action=progress&id=" . $course['id'] . "'>
          Xem tiến độ</a><br>";

    echo "------------------------------<br><br>";
}

?>
