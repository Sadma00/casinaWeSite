<form method="POST" action="index.php?action=update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $product['image'] ?>">

    Name: <input type="text" name="name" value="<?= $product['name'] ?>"><br>
    Price: <input type="text" name="price" value="<?= $product['price'] ?>"><br>

    <img src="uploads/<?= $product['image'] ?>" width="100"><br>

    Image: <input type="file" name="image"><br>

    <button type="submit">Update</button>
</form>