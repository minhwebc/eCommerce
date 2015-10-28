<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>

	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }

/*            .form-horizontal input {
          	width: 350px;
          }*/

          .form-control {
          	width: 350px;
          }

            </style>
</head>
<body>
	<div class="container">
            <?php $this->load->view('partials/nav-admin'); ?>

	<h2>Add a product</h2>	
	
  <form class="form-horizontal" action="/dashboard/create" method="post">
		<input type="hidden" name="id" value="">
  		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Name: </label>
    		<div class="col-sm-6">
      			<input type="text" class="form-control" name='name'  id="prod_name">
    		</div>
  		</div>

  		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Price </label>
    		<div class="col-sm-6">
      			<input type="text" class="form-control"  name='price' id="prod_name" >
    		</div>
  		</div>

 		<div class="form-group">
    		<label for="description" class="col-sm-2 control-label">Description: </label>
    		<div class="col-sm-6">
      			<textarea class="form-control"  rows ="5" name='description' id="prod_text"></textarea>
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
    		<div class="col-sm-6">
      			<input type="text" class="form-control" id="prod_name" placeholder="New category....">
    		</div>
  		</div>

      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Inventory Count </label>
        <div class="col-sm-6">
            <input type="text" class="form-control"  name='inventory_count' id="prod_name">
        </div>
      </div>

  		<div class="form-group">
    		<label for="exampleInputFile">Images</label>
   		 	<input type="file" id="exampleInputFile">
			
			<input type="submit" value="Add a new product">
		</div>
		</form>

		</div>
	</body>
	</html>