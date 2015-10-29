<!DOCTYPE html>
<html>
	<head>
		<title>All Products</title>
		<meta charset="UTF-8">   
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
            <a href="/dashboard/create/">Add a new product</a>

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
                <?php foreach($results as $product){ ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->name ?></a></td>
                    <td><?= $product->price ?></td>
                    <td><?= $product->inventory_count ?></td>
                    <td><?= $product->quantity_sold ?></td>
                    <td><a href="/dashboard/edit/<?= $product->id ?>">Edit</a> | <a href="/dashboard/delete/<?= $product->id ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>

            <nav>
                <ul class="pagination">
                    <?= $links ?>
                </ul>
            </nav>

        </div> 
    </body>
</html>