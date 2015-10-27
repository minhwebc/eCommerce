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
	
	<form class="form-horizontal">
  		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">Name: </label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" id="prod_name" placeholder="Name...">
    		</div>
  		</div>
  
  		<div class="form-group">
    		<label for="description" class="col-sm-2 control-label">Description: </label>
    		<div class="col-sm-10">
      			<textarea class="form-control"  rows ="5" id="prod_text" placeholder="Description"></textarea>
   			</div>
  		</div>

		<!-- <div class="btn-group">
			<label for="description" class="col-sm-2 control-label">Categories</label>
			<div class="col-sm-10">
  			<div class="btn-group btn-input clearfix"> -->
  			<!-- <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
    		<span data-bind="label">Select One</span> <span class="caret"></span>
  			</button>
  			<ul class="dropdown-menu" role="menu">
   				<li><a href="#">Item 1</a></li>
    			<li><a href="#">Another item</a></li>
    			<li><a href="#">This is a longer item that will not fit properly</a></li>
  				</ul>
			</div> -->

		<div class="form-group">
    		<label for="name" class="col-sm-2 control-label">or add a new category:</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" id="prod_name" placeholder="New category....">
    		</div>
  		</div>

  		<div class="form-group">
    		<label for="exampleInputFile">Images</label>
   		 	<input type="file" id="exampleInputFile">
		</form>


		</div>
	</body>
	</html>