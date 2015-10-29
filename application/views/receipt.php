<!DOCTYPE html>
<?php         $this->session->set_userdata('cart_amount', 0) ?>
<html>
	<head>
		<title>Receipt</title>
		<meta charset="UTF-8">
    
        <style type="text/css">
            
            .navbar {
                background-color: white;  
            }
            
            h1 {
                font-size: 150%;
            }
            #total{
            	text-align: right;
            }
            .total{
            	text-align: right;
            	border-left: 1px solid #DDD;
            }
            .head{
            	text-align: center;
            	border-left: 1px solid #DDD;
            }
            .price{
            	text-align: right;
            	border-left: 1px solid #DDD;
            }
            .amount{
            	text-align: center;
            	border-left: 1px solid #DDD;
            }
            #info{
            	width: 110%;
            	margin-bottom: 20px;
            }
            .info{
            	font-size: 25px;
            }
        </style>
	</head>
	<body>
        <?php
            $rand = array("A","B","C","D","E","F","G","H",'I',"J",'K',"L","M","N","O","P"
                            ,"Q","R","S","T","U","V","W","X","Y","Z",0,1,2,3,4,5,6,7,8,9);
            $num = $rand[rand(0,35)];
            for($i = 1; $i<14; $i++){
                $num = $num.$rand[rand(0,35)];
            };
            $pass = array("num" => $num);
        ?>
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
            <h3>Receipt</h3>
            <div class="alert alert-info" role="alert">
            	<p>Please print out or screenshot to save this receipt for future preference</p>
            </div>
            <table id="info">
            	<thead>
            		<th class="info">Order Number</th>
            		<th class="info">Order Date</th>
            	</thead>
            	<tbody>
            		<td class="info"><?php echo implode('',$pass); ?></td>
            		<td class="info"><?= $order_date['created_at'] ?></td>
            	</tbody>
            </table>
            <hr>
            <h2>Thank you for your order</h2>
            <hr>
            <p>Your order was recieved for processing. You should recive a comfirmation of payment by e-mail from SBM as well as
            the information from the product supplier regarding the arrival date of the products.</p>
            <p>If you have any questions about anything, please don't hesitate to ask!</p>
			<div class="panel panel-default">
				<div class="panel-heading">Products</div>
					<table class="table">
						<thead>
							<th class="head">ITEM</th>
							<th class="head">PRICE</th>
							<th class="head">QUANTITY</th>
							<th class="head">TOTAL</th>
						</thead>
						<tbody>
							<?php foreach($products as $product){ ?>
								<tr>
									<td><?= $product['name'] ?></td>
									<td class="price">$<?= $product['price']?></td>
									<td class="amount"><?= $product[0]['amount']?></td>
									<td class="total">$<?= $product['price']*$product[0]['amount'] ?></td>
								</tr>
							<?php } ?>
								<tr>
									<td></td>
									<td></td>
									<td id="total"><b>Total</b></td>
									<td class="total">$<?= $total ?></td>
								</tr>
						</tbody>
					</table>
			</div>
        </div> 
    </body>
</html>