<?php
class Course {
    private $conn;
    private $table = "courses";

    public function __construct($db){
        $this->conn = $db;
    }

    public function getMyCourses($instructor_id){
        $sql = "SELECT * FROM courses WHERE instructor_id = :id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$instructor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $sql = "INSERT INTO courses(title, description, instructor_id, category_id, price, duration_weeks, level, image, created_at)
                VALUES(:title, :description, :inst, :cat, :price, :dur, :level, :image, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($data){
        $sql = "UPDATE courses SET
                title=:title,
                description=:description,
                category_id=:cat,
                price=:price,
                duration_weeks=:dur,
                level=:level,
                image=:image,
                updated_at=NOW()
                WHERE id=:id AND instructor_id=:inst";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id, $inst){
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id=? AND instructor_id=?");
        return $stmt->execute([$id, $inst]);
    }
    public function getAll() {
        $sql = "SELECT * FROM courses ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm khóa học
    public function search($keyword) {
        $sql = "SELECT * FROM courses 
                WHERE title LIKE :kw OR description LIKE :kw";
        $stmt = $this->conn->prepare($sql);
        $kw = "%".$keyword."%";
        $stmt->bindParam(":kw", $kw);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh sách bài học của 1 khóa học
    public function getLessons($courseId) {
        $sql = "SELECT * FROM lessons WHERE course_id = :id ORDER BY `order` ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $courseId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
