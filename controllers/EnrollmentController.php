<?php
class EnrollmentController {

    private $enrollModel;
    private $courseModel;

    public function __construct() {
        // Chỉ yêu cầu quyền khi dùng chức năng học viên
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            // Cho phép dashboard tự xử lý
        }

        $db = new Database();
        $this->enrollModel = new Enrollment($db);
        $this->courseModel = new Course($db);
    }

    // 1. Đăng ký khóa học
    public function enroll() {
        $courseId = $_GET['course_id'];
        $studentId = $_SESSION['user_id'];

        // Kiểm tra đã đăng ký chưa
        if ($this->enrollModel->isEnrolled($courseId, $studentId)) {
            echo "<script>alert('Bạn đã đăng ký khóa học này rồi!'); history.back();</script>";
            return;
        }

        $this->enrollModel->register($courseId, $studentId);

        header("Location: index.php?controller=Student&action=my_courses_full");
    }

    // 2. Khóa học đã đăng ký
    public function myCourses() {
        $studentId = $_SESSION['user_id'];
        $courses = $this->enrollModel->getMyCourses($studentId);

        include "views/student/my_courses.php";
    }

    // 3. Xem tiến độ
    public function progress() {
        $courseId = $_GET['course_id'];
        $studentId = $_SESSION['user_id'];

        $progress = $this->enrollModel->getProgress($courseId, $studentId);
        $lessons = $this->courseModel->getLessons($courseId);

        include "views/student/course_progress.php";
    }
}
?>
