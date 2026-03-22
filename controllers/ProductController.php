<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {

    public function index() {
        $product = new Product();
        $products = $product->getAll();
        require __DIR__ . '/../views/product/index.php';
    }

    public function create() {
        require __DIR__ . '/../views/product/create.php';
    }

    public function store() {
        $product = new Product();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];

        // IMAGE UPLOAD
        $imageName = time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imageName);
        $product->image = $imageName;

        $product->create();

        header("Location: index.php");
    }

    public function edit() {
        $productModel = new Product();
        $product = $productModel->find($_GET['id']);
        require __DIR__ . '/../views/product/edit.php';
    }

    public function update() {
        $product = new Product();
        $product->id = $_POST['id'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];

        if ($_FILES['image']['name']) {
            $imageName = time() . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imageName);
            $product->image = $imageName;
        } else {
            $product->image = $_POST['old_image'];
        }

        $product->update();
        header("Location: index.php");
    }

    public function delete() {
        $product = new Product();
        $product->delete($_GET['id']);
        header("Location: index.php");
    }
}