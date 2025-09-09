<?php
class Student {
    private $pdo;

    // constructor
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create
    public function add($id_number, $name, $age, $email, $course) {
        $sql = "INSERT INTO students (id_number, name, age, email, course) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_number, $name, $age, $email, $course]);
    }

    // Read all
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM students ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read one
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update($id, $id_number, $name, $age, $email, $course) {
        $sql = "UPDATE students SET id_number=?, name=?, age=?, email=?, course=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_number, $name, $age, $email, $course, $id]);
    }

    // Delete
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }
}
