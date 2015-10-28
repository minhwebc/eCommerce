<!DOCTYPE html>
<html>
	<head>
		<title>Our Product</title>
		<meta charset="UTF-8">
        <style type="text/css">
            
            h1 {
                font-size: 150%;
            }
            
            #product {
                margin-bottom: 100px;    
            }
            
                #product img {
                    max-width: 100%;
                }
            
            select {
                margin-bottom: 10px;
            }
            
            #similar img {
                max-width: 200px;
            }
            
            #similar h3, h3, a {
                font-size: 104%;
                color: skyblue;
                font-weight:bold;
            }
            
            .price {
                color: darkred;   
            }
            
            .similar {
                padding: 20px;
            }
            
            #addToCart {
                margin-top: 10px;   
            }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
            <div class="row" id="product">
                <div class="col-md-4 col-md-offset-2">
                    <img src="/assets/images/<?= $product['source'] ?>">
                </div>
                
                <div class="col-md-4">
                    <h1><?= $product['name'] ?></h1>
                    <p><?= $product['description'] ?></p>
                    <form action="/products/update_cart/" method="post">
                        <select name="amount" class="form-control">
                         <option value="1">1 Sticker Set ($<?= $product['price'] ?>)</option>
                        <?php for ($i = 2; $i <= 4; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?> Sticker Sets ($<?= $product['price'] * $i ?>)</option>
                        <?php } ?>
                        </select>
                        <input type="hidden" name="name" value="<?= $product['name'] ?>">
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

                        <button id="addToCart" type="submit" class="btn btn-default">Add to Cart</button>
                    </form>
                </div>
            </div>
            <div id="similar">
                <h1>Similar Products</h1>
                <div class="row similar">
                    <?php foreach($similar as $sample) { ?>
                    <div class="col-md-3">
                        <a href="/products/show/<?= $sample['id'] ?>"><img src="/assets/images/<?= $sample['source'] ?>">
                        <h3> <?= $sample['name'] ?></h3></a>
                        <p class="price">$<?= $sample['price'] ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div> 
    </body>
</html>