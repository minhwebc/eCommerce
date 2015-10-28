<!DOCTYPE html>
<html>
	<head>
		<title>All Products</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>      
        <style type="text/css">
            
            .navbar {
                background-color: white;  
            }
            
            h1 {
                font-size: 150%;
            }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('partials/nav-admin'); ?>

            <!--Add new product-->
            <a href="/products/create/">Add a new product</a>

            <!-- Product Table -->
            <h1>All Products</h1>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
                    <th>Action</th>
                </tr>
                <?php foreach($products as $detail){ ?>
                <tr>
                    <td><?= $detail['id'] ?></td>
                    <td><?= $detail['name'] ?></a></td>
                    <td><?= $detail['price'] ?></td>
                    <td><?= $detail['inventory_count'] ?></td>
                    <td></td>
                    <td><a href="/products/edit/<?= $detail["id"] ?>">Edit</a> | <a href="/products/delete/<?= $detail["id"] ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div> 
    </body>
</html>