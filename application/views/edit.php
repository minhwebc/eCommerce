<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Product</title>
        <?php $this->load->view('partials/meta'); ?>
        <script>
            $(document.body).on( 'click', '.dropdown-menu li', function( event ) {
                var $target = $( event.currentTarget );
                $target.closest( '.btn-group' ).find( '[data-bind="label"]' )
                .text( $target.text() ).end().children( '.dropdown-toggle' ).dropdown( 'toggle' );
                return false;
            });
        </script>
        <style type="text/css">
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
    		<div class="col-sm-6">
      			<textarea class="form-control"  rows ="5" name='description' id="prod_text" > <?= $product['description'] ?> </textarea>
   			</div>
  		</div>

        <div class="form-group">
            <label for="sell" class="col-sm-2 control-label">Select list:</label>
            <div class="col-sm-6"> 
                <select class="form-control" id="sell">
                    <?php foreach($cat_results as $cat_result){?>
                        <option value = "<?= $cat_result['id']?>"><?= $cat_result['name']?></option>
                    <?php } ?>
                <select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Inventory Count </label>
            <div class="col-sm-6">
                <input type="text" class="form-control"  name='inventory' id="prod_name"  value ="<?= $product['inventory_count'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">Images</label>
            <div class="col-sm-6">
                <input type="file" id="exampleInputFile">
            </div>
        </div>
                    
        <div class="form-group" >
            <div class="col-sm-offset-2 col-sm-2">
                <input type="submit" value="Update">
            </div>
        </div>
    </form>
</html>
