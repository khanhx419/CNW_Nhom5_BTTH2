<?php
class CourseController {

    public function __construct(){
        AuthMiddleware::requireInstructor();
        $this->courseModel = new Course(Database::connect());
    }

    public function index(){
        $courses = $this->courseModel->getMyCourses($_SESSION['user_id']);
        require_once "./views/instructor/my_courses.php";
    }

    public function create(){
        require "./views/instructor/course/create.php";
    }

    public function store(){
        $data = [
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':inst' => $_SESSION['user_id'],
            ':cat' => $_POST['category'],
            ':price' => $_POST['price'],
            ':dur' => $_POST['duration'],
            ':level' => $_POST['level'],
            ':image' => $_FILES['image']['name']
        ];

        move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/courses/".$data[':image']);

        $this->courseModel->create($data);
        header("Location: index.php?controller=Course&action=index");
    }

    public function edit(){
        $course = $this->courseModel->getById($_GET['id']);
        require "./views/instructor/course/edit.php";
    }

    public function update(){
        $data = [
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':cat' => $_POST['category'],
            ':price' => $_POST['price'],
            ':dur' => $_POST['duration'],
            ':level' => $_POST['level'],
            ':image' => $_FILES['image']['name'],
            ':id' => $_POST['id'],
            ':inst' => $_SESSION['user_id']
        ];

        move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/courses/".$data[':image']);

        $this->courseModel->update($data);
        header("Location: index.php?controller=Course&action=index");
    }

    public function delete(){
        $this->courseModel->delete($_GET['id'], $_SESSION['user_id']);
        header("Location: index.php?controller=Course&action=index");
    }
}
