<a href="index.php?action=create">Add Product</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Image</th>
    <th>Actions</th>
</tr>

<?php while($row = $products->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['price'] ?></td>
    <td><img src="uploads/<?= $row['image'] ?>" width="80"></td>
    <td>
        <a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a>
        <a href="index.php?action=delete&id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>