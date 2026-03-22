<?php
require_once __DIR__ . '/../models/Employee.php';

class EmployeeController {

    public function index() {
        $model = new Employee();
        $employees = $model->getAll();
        require __DIR__ . '/../views/employee/index.php';
    }

    public function create() {
        require __DIR__ . '/../views/employee/create.php';
    }

    public function store() {
        $emp = new Employee();
        $emp->name = $_POST['name'];
        $emp->email = $_POST['email'];
        $emp->salary = $_POST['salary'];

        // Upload image
        $img = time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img);
        $emp->image = $img;

        $emp->create();
        header("Location: index.php?module=employee");
        exit;
    }

    public function edit() {
        $model = new Employee();
        $employee = $model->find($_GET['id']);
        require __DIR__ . '/../views/employee/edit.php';
    }

    public function update() {
        $emp = new Employee();
        $emp->id = $_POST['id'];
        $emp->name = $_POST['name'];
        $emp->email = $_POST['email'];
        $emp->salary = $_POST['salary'];

        // Check if new image uploaded
        if (!empty($_FILES['image']['name'])) {
            $img = time() . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img);
            $emp->image = $img;
        } else {
            $emp->image = $_POST['old_image'];
        }

        $emp->update();
        header("Location: index.php?module=employee");
        exit;
    }

    public function delete() {
        if (!isset($_GET['id'])) {
            die("ID not provided");
        }

        $emp = new Employee();

        // Optional: get employee to delete image
        $employee = $emp->find($_GET['id']);
        if ($employee && file_exists("uploads/" . $employee['image'])) {
            unlink("uploads/" . $employee['image']);
        }

        $emp->id = $_GET['id'];
        $emp->delete();

        header("Location: index.php?module=employee");
        exit;
    }
}