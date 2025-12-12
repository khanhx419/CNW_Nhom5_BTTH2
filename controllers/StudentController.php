<?php
require_once "models/Course.php";
require_once "models/Enrollment.php";
require_once "config/Database.php";
class StudentController
{

    private $courseModel;
    private $enrollModel;

    public function __construct()
    {
        // Chỉ yêu cầu quyền khi dùng chức năng học viên
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            // Cho phép dashboard tự xử lý hoặc redirect tuỳ logic
        }

        // Khởi tạo models
        $db = new Database();
        $this->courseModel = new Course($db);
        $this->enrollModel = new Enrollment($db);
    }

    public function dashboard()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header("Location: /CNW/CNW_Nhom5_BTTH2/auth/login");
            exit();
        }
        include 'views/student/dashboard.php';
    }

    // --- BẮT ĐẦU PHẦN MERGE TỪ TUẤN ANH ---

    // Chỗ 1: Hàm my_courses lấy dữ liệu chuẩn
    public function my_courses()
    {
        // Lấy danh sách khóa học của user trước khi include view
        $myCourses = $this->enrollModel->getMyCourses($_SESSION['user_id']);
        include 'views/student/my_courses.php';
    }

    // Chỗ 2: Các hàm chức năng mở rộng của Tuấn Anh

    // 1. Hiển thị danh sách tất cả khóa học
    public function courses()
    {
        $courses = $this->courseModel->getAll();
        include 'views/courses/index.php';
    }

    // 2. Xem chi tiết khóa học
    public function detail()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Không tìm thấy khóa học!";
            return;
        }

        $course = $this->courseModel->getById($id);
        $lessons = $this->courseModel->getLessons($id);

        include 'views/courses/detail.php';
    }

    // 3. Tìm kiếm khóa học
    public function search()
    {
        $keyword = $_GET['keyword'] ?? "";
        $courses = $this->courseModel->search($keyword);

        include 'views/courses/search.php';
    }

    // 4. Đăng ký khóa học
    public function enroll()
    {
        $courseId = $_GET['id'];
        $studentId = $_SESSION['user_id'];

        // Kiểm tra xem đã đăng ký chưa
        if ($this->enrollModel->isEnrolled($courseId, $studentId)) {
            echo "<script>
                alert('Bạn đã đăng ký khóa này rồi!');
                history.back();
            </script>";
            exit;
        }

        $this->enrollModel->register($courseId, $studentId);

        // Redirect lại về trang khóa học của tôi
        header("Location: index.php?controller=Student&action=my_courses_full");
    }

    // 5. Danh sách khóa học đã đăng ký (Bản đầy đủ)
    public function my_courses_full()
    {
        $studentId = $_SESSION['user_id'];
        $courses = $this->enrollModel->getMyCourses($studentId); // Lưu ý biến tên là $courses
        include 'views/student/my_courses.php';
    }

    // 6. Theo dõi tiến độ
    public function progress()
    {
        $courseId = $_GET['id'];
        $studentId = $_SESSION['user_id'];

        $progress = $this->enrollModel->getProgress($courseId, $studentId);
        $lessons = $this->courseModel->getLessons($courseId);

        include 'views/student/course_progress.php';
    }
} // Kết thúc class StudentController