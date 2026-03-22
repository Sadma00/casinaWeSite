<?php
require_once __DIR__ . '/../config/database.php';

class Employee {
    public $id, $name, $email, $salary, $image;
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM employees");
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO employees(name,email,salary,image) VALUES(?,?,?,?)");
        $stmt->bind_param("ssds", $this->name, $this->email, $this->salary, $this->image);
        return $stmt->execute();
    }

    public function update() {
        $stmt = $this->conn->prepare("UPDATE employees SET name=?,email=?,salary=?,image=? WHERE id=?");
        $stmt->bind_param("ssdsi", $this->name, $this->email, $this->salary, $this->image, $this->id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM employees WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}