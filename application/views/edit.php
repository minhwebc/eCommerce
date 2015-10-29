<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>

	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        

		<script>
		$( document.body ).on( 'click', '.dropdown-menu li', function( event ) {
 
   var $target = $( event.currentTarget );
 
   $target.closest( '.btn-group' )
      .find( '[data-bind="label"]' ).text( $target.text() )
         .end()
      .children( '.dropdown-toggle' ).dropdown( 'toggle' );
 
   return false;
 
});
		</script>
    
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }

            .form-horizontal input {
          	width: 350px;
          }

          .form-control {
          	width: 350px;
          }

            </style>
</head>
<body>
	<div class="container">
            <?php $this->load->view('partials/nav-admin'); ?>

	<h2>Edit a product</h2>
	
	<form class="form-horizontal" action="/dashboard/update_product" method="post">
		<input type="hidden" name="id" value="<?= $product['id'] ?>">
  		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Name: </label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name='name'  id="prod_name"  value ="<?= $product['name'] ?>">
    		</div>
  		</div>

  		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Price </label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control"  name='price' id="prod_name"  value ="<?= $product['price'] ?>">
    		</div>
  		</div>

 		<div class="form-group">
    		<label for="description" class="col-sm-2 control-label">Description: </label>
    		<div class="col-sm-10">
      			<textarea class="form-control"  rows ="5" name='description' id="prod_text" value="<?= $product['description'] ?>"></textarea>
   			</div>
  		</div>

			<div class="form-group">
			  <label for="sell">Select list:</label>
			  <select class="form-control" id="sell">
			    <option>Food</option>
			    <option>Seasonal</option>
			    <option>Bills</option>
			  </select>
			</div>

		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">or add a new category:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" id="prod_name" placeholder="New category....">
    		</div>
  		</div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Inventory Count </label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name='inventory' id="prod_name"  value ="<?= $product['inventory_count'] ?>">
        </div>
      </div>


  		<div class="form-group">
    		<label for="exampleInputFile">Images</label>
   		 	<input type="file" id="exampleInputFile">
			
			<input type="submit" value="Update">
		</div>
		</form>


		</div>
	</body>
	</html>