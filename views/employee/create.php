<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
</head>
<body>

<h2>Add Employee</h2>

<form method="POST" action="index.php?module=employee&action=store" enctype="multipart/form-data">
    
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Salary:</label><br>
    <input type="number" name="salary" required><br><br>

    <label>Image:</label><br>
    <input type="file" name="image" required><br><br>

    <button type="submit">Save</button>
</form>

<br>
<a href="index.php?module=employee">Back</a>

</body>
</html>