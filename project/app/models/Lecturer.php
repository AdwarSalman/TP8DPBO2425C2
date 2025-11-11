<?php
require_once "config/database.php";

class Lecturer
{
    private $conn;
    private $table = "lecturers";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // 🟢 READ: Ambil semua data dosen
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        return $this->conn->query($query);
    }

    // 🟢 READ (by ID): Ambil satu data dosen berdasarkan id
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🟢 CREATE: Tambahkan dosen baru
    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date']
        ]);
    }

    // 🟢 UPDATE: Edit data dosen
    public function update($data)
    {
        $query = "UPDATE " . $this->table . " SET name = ?, nidn = ?, phone = ?, join_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['name'],
            $data['nidn'],
            $data['phone'],
            $data['join_date'],
            $data['id']
        ]);
    }

    // 🟢 DELETE: Hapus dosen
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
