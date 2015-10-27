<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
</head>
<body>

	<h2>Edit a product</h2>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $product['id'] ?>">
		<input type="text" name="name" value="<?= $product['name'] ?>">
		<input type="text" name="description" value="<?= $product['description'] ?>">
		<input type="text" name="price" value="<?= $product['price'] ?>">
		<input type="submit" value="Edit">
	</form>
	
</body>
</html>