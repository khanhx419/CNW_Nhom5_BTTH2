<?php
class Lesson {
    private $conn;
    private $table = "lessons";

    public function __construct($db){
        $this->conn = $db;
    }

    public function getLessonsByCourse($course_id){
        $stmt = $this->conn->prepare("SELECT * FROM lessons WHERE course_id=? ORDER BY `order` ASC");
        $stmt->execute([$course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $sql = "INSERT INTO lessons(course_id, title, content, video_url, `order`, created_at)
                VALUES(:course_id, :title, :content, :video, :order, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($data){
        $sql = "UPDATE lessons SET 
                title=:title, 
                content=:content,
                video_url=:video,
                `order`=:order
                WHERE id=:id AND course_id=:course_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM lessons WHERE id=?");
        return $stmt->execute([$id]);
    }
    public function getById($id){
    $stmt = $this->conn->prepare("SELECT * FROM lessons WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
