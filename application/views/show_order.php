<!DOCTYPE html>
<html>
    <head>
        <title>Order</title>
        <meta charset="UTF-8">
        <?php $this->load->view('partials/meta'); ?>
        <style type="text/css">
            #order{
                display: inline-block;
                margin-right: 150px;
                border: 1px solid #DDD;
                padding: 20px;
            }

            table{
                display: inline-block;
                width: 700px;
                vertical-align: top;
                margin-bottom: 30px;
            }

            .head{
                padding-right: 40px;
                border-bottom: 1px solid #DDD;
            }

            #total{
                display: inline-block;
                border: 1px solid black;
                vertical-align: right;
                width: 150px;
                padding: 20px;
                overflow: hidden;
            }

            #status{
                display: inline-block;
                width: 200px;
                overflow: hidden;
                vertical-align: top;
                margin-right: 30px;
            }

            #products{
                display: inline-block;
                width: 600px;
                vertical-align: top;

            }

            table tr td{
                padding-right: 20px;
                border-bottom: 1px solid #DDD;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('/partials/nav-admin'); ?>
            <div id="order">
                <h2>Order ID: <?= $ship['id'] ?></h2>
                <br>
                <h3>Customer shipping info:</h3>
                <p>Name: <?= $ship['first_name']?></p>
                <p>Address: <?= $ship['address']?></p>
                <p>City: <?= $ship['city']?></p>
                <p>State: <?= $ship['state']?></p>
                <p>Zip: <?= $ship['zipcode']?></p>
                <br>
                <hr>
                <h3>Customer billing info:</h3>
                <p>Name: <?= $bill['first_name']?></p>
                <p>Address: <?= $bill['address']?></p>
                <p>City: <?= $bill['city']?></p>
                <p>State: <?= $bill['state']?></p>
                <p>Zip: <?= $bill['zipcode']?></p>
            </div>
            <div id="products">
                <table>
                    <tr>
                        <th class="head">ID</th>
                        <th class="head">Item</th>
                        <th class="head">Price</th>
                        <th class="head">Quantity</th>
                        <th class="head">Total</th>
                    </tr>
                    <?php foreach($products as $product){?>
                        <tr>
                            <td><?= $product['id']?></td>
                            <td><?= $product['name']?></td>
                            <td>$<?= $product['price']?></td>
                            <td><?= $product['quantity']?></td>
                            <td>$<?= $product['price']*$product['quantity']?></td>
                        </tr>
                    <?php }?>
                </table>
                <div id="status" class="alert alert-success" role="alert">
                    <p>Status: <?= $ship['status'] ?></p>
                </div>
                <div id="total">
                    <p>Total Price: $<?= $ship['total'] ?></p>
                </div>
            </div>
        </div>
    </body>
</html>