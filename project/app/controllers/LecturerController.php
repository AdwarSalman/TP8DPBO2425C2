<?php
require_once "app/models/Lecturer.php";

class LecturerController
{
    private $model;

    public function __construct()
    {
        $this->model = new Lecturer();
    }

    // 🟢 INDEX — tampilkan semua dosen
    public function index()
    {
        $data = $this->model->getAll();
        include "app/views/lecturer/index.php";
    }

    // 🟢 CREATE — tampilkan form & simpan data baru
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create([
                'name' => $_POST['name'],
                'nidn' => $_POST['nidn'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date']
            ]);
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        }
        include "app/views/lecturer/create.php";
    }

    // 🟢 EDIT — tampilkan form edit & update data
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update([
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'nidn' => $_POST['nidn'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date']
            ]);
            header("Location: index.php?controller=lecturer&action=index");
            exit;
        } else {
            $data = $this->model->getById($_GET['id']);
            include "app/views/lecturer/edit.php";
        }
    }

    // 🟢 DELETE — hapus data dosen
    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->model->delete($_GET['id']);
        }
        header("Location: index.php?controller=lecturer&action=index");
        exit;
    }
}
?>
