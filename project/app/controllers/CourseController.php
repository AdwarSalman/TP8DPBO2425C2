<?php
require_once 'app/models/Course.php';
require_once 'app/models/Lecturer.php';

class CourseController {
    public function index() {
        $model = new Course();
        $data = $model->getAll();
        include 'app/views/course/index.php';
    }

    public function create() {
        $lecturer = new Lecturer();
        $lecturers = $lecturer->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new Course();
            $model->course_name = $_POST['course_name'];
            $model->course_code = $_POST['course_code'];
            $model->lecturer_id = $_POST['lecturer_id'];
            $model->create();
            header("Location: index.php?controller=course&action=index");
        } else {
            include 'app/views/course/create.php';
        }
    }

    public function edit() {
        $lecturer = new Lecturer();
        $lecturers = $lecturer->getAll();
        $model = new Course();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->id = $_POST['id'];
            $model->course_name = $_POST['course_name'];
            $model->course_code = $_POST['course_code'];
            $model->lecturer_id = $_POST['lecturer_id'];
            $model->update();
            header("Location: index.php?controller=course&action=index");
        } else {
            $data = $model->getById($_GET['id']);
            include 'app/views/course/edit.php';
        }
    }

    public function delete() {
        $model = new Course();
        $model->delete($_GET['id']);
        header("Location: index.php?controller=course&action=index");
    }
}
?>
