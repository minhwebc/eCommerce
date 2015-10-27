<!DOCTYPE html>
<html>
	<head>
		<title>Our Product</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>      
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
            
            #similar .h3, h3, a {
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
                    <form>
                        <select class="form-control">
                        <?php for ($i = 1; $i <= 4; $i++) { ?>
                            <option><?= $i ?> Sticker Set ($<?= $product['price'] * $i ?>)</option>
                        <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-default">Add to Cart</button>
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