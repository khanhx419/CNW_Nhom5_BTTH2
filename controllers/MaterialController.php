<?php
require_once 'config/Database.php';
require_once 'controllers/AuthMiddleware.php';
require_once 'models/Material.php';

class MaterialController {

    private $materialModel;

    public function __construct() {
        AuthMiddleware::requireInstructor();

        $database = new Database();
        $db = $database->getConnection();

        $this->materialModel = new Material($db);
    }

    public function upload() {

        $lesson_id = $_POST['lesson_id'];
        $course_id = $_POST['course_id'];
        $file = $_FILES['file'];

        // Tạo tên file tránh trùng
        $filename = time() . "_" . basename($file['name']);
        $path = "assets/uploads/materials/" . $filename;

        // Upload file
        move_uploaded_file($file['tmp_name'], $path);

        $data = [
            ':lesson_id' => $lesson_id,
            ':filename'  => $file['name'],
            ':path'      => $path,
            ':type'      => $file['type']
        ];

        $this->materialModel->upload($data);

        // Redirect đúng router
        header("Location: /CNW_Nhom5_BTTH2/lesson/manage?course_id=" . $course_id);
        exit();
    }
}
