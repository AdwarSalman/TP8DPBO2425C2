<?php
require_once 'app/models/Student.php';
require_once 'app/models/Course.php';

class StudentController {
    public function index() {
        $model = new Student();
        $data = $model->getAll();
        include 'app/views/student/index.php';
    }

    public function create() {
        $course = new Course();
        $courses = $course->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Student();
            $model->name = $_POST['name'];
            $model->nim = $_POST['nim'];
            $model->email = $_POST['email'];
            $model->course_id = $_POST['course_id'];
            $model->create();
            header("Location: index.php?controller=student&action=index");
        } else {
            include 'app/views/student/create.php';
        }
    }

    public function edit() {
        $course = new Course();
        $courses = $course->getAll();
        $model = new Student();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->id = $_POST['id'];
            $model->name = $_POST['name'];
            $model->nim = $_POST['nim'];
            $model->email = $_POST['email'];
            $model->course_id = $_POST['course_id'];
            $model->update();
            header("Location: index.php?controller=student&action=index");
        } else {
            $data = $model->getById($_GET['id']);
            include 'app/views/student/edit.php';
        }
    }

    public function delete() {
        $model = new Student();
        $model->delete($_GET['id']);
        header("Location: index.php?controller=student&action=index");
    }
}
?>
