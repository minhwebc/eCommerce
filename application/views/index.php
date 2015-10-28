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
            <h1> Welcome! </h1>
            <div class ="sort_controls">
                <label> Sorted by:</label>
                <!-- Single button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Most recent <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Most recent</a></li>
                        <li><a href="#">Lowest to Highest</a></li>
                        <li><a href="#">Highest to Lowest</a></li>
                    </ul>
                </div>     
            </div>
            <div id ="listing_wrapper">    
            <?php $count=0;
                foreach($products as $product){ 
                    if ($count % 3 == 0){ ?>
                        <div class ="row">
                    <?php }  
                        $count ++; ?>
                        <div class="col-md-4"><a href="/products/show/<?= $product['product_id'] ?>" class="thumbnail">
                        <img src="assets/images/<?= $product['source'] ?>" alt="Kawaii Bag"></a></div>
                        <?php if ($count % 3 == 0){ ?>
                            </div>
                        <?php }
                } ?>
                </div>
             <nav>
              <ul class="pagination">
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">2 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">3 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">4 <span class="sr-only">(current)</span></a></li>
              </ul>
            </nav>
        </div> 
    </body>
</html>