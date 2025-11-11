<?php
require_once 'config/database.php';

class Student {
    private $conn;
    private $table = 'students';

    public $id;
    public $name;
    public $nim;
    public $email;
    public $course_id;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $sql = "SELECT s.*, c.course_name 
                FROM $this->table s
                LEFT JOIN courses c ON s.course_id = c.id";
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
        $sql = "INSERT INTO $this->table (name, nim, email, course_id)
                VALUES (:name, :nim, :email, :course_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':nim', $this->nim);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':course_id', $this->course_id);
        return $stmt->execute();
    }

    public function update() {
        $sql = "UPDATE $this->table 
                SET name=:name, nim=:nim, email=:email, course_id=:course_id
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':nim', $this->nim);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':course_id', $this->course_id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
