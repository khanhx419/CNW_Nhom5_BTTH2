<?php
class MaterialController {

    public function __construct(){
        AuthMiddleware::requireInstructor();
        $this->materialModel = new Material(Database::connect());
    }

    public function upload(){
        $lesson_id = $_POST['lesson_id'];
        $file = $_FILES["file"];

        $filename = time() . "_" . $file['name'];
        $path = "assets/uploads/materials/" . $filename;
        move_uploaded_file($file['tmp_name'], $path);

        $data = [
            ':lesson_id' => $lesson_id,
            ':filename'  => $file['name'],
            ':path'      => $path,
            ':type'      => $file['type']
        ];

        $this->materialModel->upload($data);

        header("Location: index.php?controller=Lesson&action=manage&course_id=".$_POST['course_id']);
    }
}
