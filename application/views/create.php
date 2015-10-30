<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Product</title>
        <?php $this->load->view('partials/meta'); ?>
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
            <h2>Add a product</h2>	
            <form class="form-horizontal" action="/dashboard/create_product" enctype="multipart/form-data" method="post">
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
                        <input type="text" class="form-control"  name='price'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description: </label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows ="5" name='description' id="prod_text"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sell" class="col-sm-2 control-label" >Select list:</label>
                    <div class="col-sm-6">
                        <select name ="category" class="form-control" id="sell">
                            <?php foreach($cat_results as $cat_result){?>
                                <option value = "<?= $cat_result['id']?>"><?= $cat_result['name']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Or add a new category: </label>
                    <div class="col-sm-6">  
                        <input type="text" name ="category_new" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Inventory Count: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name='inventory_count'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-2 control-label">Image: </label>
                    <div class="col-sm-6">
                        <input type="file" name ="userfile" size ="20" id="exampleInputFile">
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-sm-offset-2 col-sm-2">
                        <input type="submit" value="Add a new product">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
