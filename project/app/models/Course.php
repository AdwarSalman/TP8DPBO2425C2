<?php
require_once 'config/database.php';

class Course {
    private $conn;
    private $table = 'courses';

    public $id;
    public $course_name;
    public $course_code;
    public $lecturer_id;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $sql = "SELECT c.*, l.name AS lecturer_name 
                FROM $this->table c
                LEFT JOIN lecturers l ON c.lecturer_id = l.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $sql = "INSERT INTO $this->table (course_name, course_code, lecturer_id)
                VALUES (:course_name, :course_code, :lecturer_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_name', $this->course_name);
        $stmt->bindParam(':course_code', $this->course_code);
        $stmt->bindParam(':lecturer_id', $this->lecturer_id);
        return $stmt->execute();
    }

    public function update() {
        $sql = "UPDATE $this->table 
                SET course_name=:course_name, course_code=:course_code, lecturer_id=:lecturer_id
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':course_name', $this->course_name);
        $stmt->bindParam(':course_code', $this->course_code);
        $stmt->bindParam(':lecturer_id', $this->lecturer_id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
