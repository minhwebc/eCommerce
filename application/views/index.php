<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
        <?php $this->load->view('partials/meta'); ?>
        <style type="text/css">
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
            
            #img {
                text-align: center;
                margin-bottom: 20px;
            }  
        </style>
	</head>
	<body>     
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
            <div id='img'>
                <?php if($this->session->userdata('style') == 0) { ?>
                    <img src="/assets/images/rainbow.png">
                    <h3 id="subtitle"> Check out our Newest Stickers! </h3>
                <?php } else { ?>
                    <img src="/assets/images/slide01.png">
                    <h3 id="subtitle">CHECK OUT OUR NEWEST STICKERS! </h3>
                <?php } ?>
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
             <div id="footer">
                <a href="/products/stickers/all">See more</a>
            </div>
        </div> 
    </body>
</html>