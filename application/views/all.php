<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }
            
            .sort_controls {
                margin: 25px 0px;
                vertical-align:top;
            }
            
        </style>
	</head>
	<body>     
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
        
            <div id ="listing_wrapper">    

                        <?php $count=0;
                foreach($results as $product){ 
                    if ($count % 3 == 0){ ?>
                        <div class ="row">
                    <?php }  
                        $count ++; ?>
                        <div class="col-md-4">                        
                            <a href="/products/show/<?= $product->id ?>" class="thumbnail">
                        <img src="/assets/images/<?= $product->source ?>" 
                             alt="Kawaii Bag"></a></div>
                        <?php if ($count % 3 == 0){ ?>
                            </div>
                        <?php }
                } ?>
                </div>
            <nav>


        <nav>
            <ul class="pagination">
                <?= $links ?>
            </ul>
                </nav>

        </div> 
    </body>
</html>