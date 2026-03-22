<?php
require_once __DIR__ . '/../config/database.php';

class Product {
    public $id;
    public $name;
    public $price;
    public $image;

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // CREATE
    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO products(name, price, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $this->name, $this->price, $this->image);
        return $stmt->execute();
    }

    // READ
    public function getAll() {
        return $this->conn->query("SELECT * FROM products");
    }

    // FIND
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update() {
        $stmt = $this->conn->prepare("UPDATE products SET name=?, price=?, image=? WHERE id=?");
        $stmt->bind_param("sdsi", $this->name, $this->price, $this->image, $this->id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}