<?php
class Enrollment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Kiểm tra học viên đã đăng ký khóa học chưa
    public function isEnrolled($courseId, $studentId) {
        $sql = "SELECT id FROM enrollments 
                WHERE course_id = :course AND student_id = :student";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":course", $courseId);
        $stmt->bindParam(":student", $studentId);
        $stmt->execute();
        return $stmt->fetch() ? true : false;
    }

    // Đăng ký khóa học
    public function register($courseId, $studentId) {
        $sql = "INSERT INTO enrollments(course_id, student_id, enrolled_date, status, progress)
                VALUES(:course, :student, NOW(), 'active', 0)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":course", $courseId);
        $stmt->bindParam(":student", $studentId);
        return $stmt->execute();
    }

    // Lấy danh sách khóa học đã đăng ký
    public function getMyCourses($studentId) {
        $sql = "SELECT c.*, e.progress, e.status
                FROM enrollments e
                JOIN courses c ON e.course_id = c.id
                WHERE e.student_id = :student";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":student", $studentId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tiến độ học tập
    public function getProgress($courseId, $studentId) {
        $sql = "SELECT progress FROM enrollments 
                WHERE course_id = :course AND student_id = :student";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":course", $courseId);
        $stmt->bindParam(":student", $studentId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tăng tiến độ
    public function increaseProgress($courseId, $studentId, $value) {
        $sql = "UPDATE enrollments 
                SET progress = LEAST(progress + :val, 100)
                WHERE course_id = :course AND student_id = :student";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":val", $value);
        $stmt->bindParam(":course", $courseId);
        $stmt->bindParam(":student", $studentId);

        return $stmt->execute();
    }
}
?>
