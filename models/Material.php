<?php
class Material {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function upload($data){
        $sql = "INSERT INTO materials(lesson_id, filename, file_path, file_type, uploaded_at)
                VALUES(:lesson_id, :filename, :path, :type, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function getByLesson($lesson_id){
        $stmt = $this->conn->prepare("SELECT * FROM materials WHERE lesson_id=?");
        $stmt->execute([$lesson_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
