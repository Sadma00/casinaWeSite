<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
</head>
<body>

<h2>Employee List</h2>

<a href="index.php?module=employee&action=create">Add Employee</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Salary</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($employees as $emp): ?>
    <tr>
        <td><?= $emp['id'] ?></td>
        <td><?= $emp['name'] ?></td>
        <td><?= $emp['email'] ?></td>
        <td><?= $emp['salary'] ?></td>
        <td>
            <img src="uploads/<?= $emp['image'] ?>" width="80">
        </td>
        <td>
            <a href="index.php?module=employee&action=edit&id=<?= $emp['id'] ?>">Edit</a>
            |
            <a href="index.php?module=employee&action=delete&id=<?= $emp['id'] ?>" 
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>