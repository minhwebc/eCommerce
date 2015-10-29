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
            
            #subtitle {
                font-size: 20px;
                margin-bottom: 25px;
            }
            
            #footer {
                text-align: right;   
            }
            #img{
                width: 100%;
                margin-bottom: 20px;
            }
            body{
                background-image: url("/assets/images/background.jpeg");
            }
            
        </style>
	</head>
	<body>     
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
            <img id='img' src="/assets/images/slide01.png">
            <h3 id="subtitle"> Check out our Newest Stickers! </h3>
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
             <div id="footer">
                <a href="/products/stickers/all">See more</a>
            </div>
        </div> 
    </body>
</html>