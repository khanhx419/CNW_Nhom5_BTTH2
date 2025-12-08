<?php
class LessonController {
    private $lessonModel;

    public function __construct(){
        AuthMiddleware::requireInstructor();
        $this->lessonModel = new Lesson(new Database());
    }

    public function manage(){
        $lessons = $this->lessonModel->getLessonsByCourse($_GET['course_id']);
        require "./views/instructor/lessons/manage.php";
    }

    public function create(){
        require "./views/instructor/lessons/create.php";
    }

    public function store(){
        $data = [
            ':course_id' => $_POST['course_id'],
            ':title'     => $_POST['title'],
            ':content'   => $_POST['content'],
            ':video'     => $_POST['video'],
            ':order'     => $_POST['order']
        ];

        $this->lessonModel->create($data);
        header("Location: index.php?controller=Lesson&action=manage&course_id=".$_POST['course_id']);
    }

    public function edit(){
        $lesson = $this->lessonModel->getById($_GET['id']);
        require "./views/instructor/lessons/edit.php";
    }

    public function update(){
        $data = [
            ':title'   => $_POST['title'],
            ':content' => $_POST['content'],
            ':video'   => $_POST['video'],
            ':order'   => $_POST['order'],
            ':id'      => $_POST['id'],
            ':course_id'=> $_POST['course_id']
        ];
        $this->lessonModel->update($data);
        header("Location: index.php?controller=Lesson&action=manage&course_id=".$_POST['course_id']);
    }

    public function delete(){
        $this->lessonModel->delete($_GET['id']);
        header("Location: index.php?controller=Lesson&action=manage&course_id=".$_GET['course_id']);
    }
}
