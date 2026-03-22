<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form method="POST" action="index.php?module=employee&action=update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $employee['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $employee['image'] ?>">

    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $employee['name'] ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $employee['email'] ?>" required><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary" value="<?= $employee['salary'] ?>" required><br><br>

    <label>Current Image:</label><br>
    <img src="uploads/<?= $employee['image'] ?>" width="100"><br><br>

    <label>Change Image:</label><br>
    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="index.php?module=employee">Back</a>

</body>
</html>