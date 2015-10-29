<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shipping and Billing</title>
    
    <script>
        $( document ).ready(function() {
            $("select").change(function(){                 
               $(this).parent().children().last().val($(this).val() 
                            - $(this).parent().children().last().val());
                $(this).parent().submit();
            });
        });
    
    </script>
    
    <style type="text/css">

    #total {
        font-size: 105%;   
        text-align: right;
        font-weight:bold;
    }
        
    h1 {
        font-size: 150%;
        margin-bottom: 25px;
        border-bottom: 2px solid gray;
        padding-bottom: 10px;
    }
        
     #similar {
        padding: 40px 20px 20px 20px;
    }
        
        #similar img {
            max-width: 200px;
        }

        #similar h3, #similar a {
            font-size: 104%;
            color: skyblue;
            font-weight:bold;
        }

        .price {
            color: darkred;   
        }
            

        #purchased {
            max-width:200px;
        }
    
        
        .title {
            font-weight: bold;   
        }
        
        .row {
            margin-bottom: 40px;   
        }
        
        #success {
            color: green;
            font-weight: bold;
        }
        
        form {
            display: inline;
        }
        
        .remove a {
            font-size: smaller;
            color: gray;
        }
        
    </style>
</head>
    
<body>
	<div class="container">
        <?php $this->load->view('partials/nav'); ?>
        <h1>Shopping Cart</h1>
          
        <?php $total = 0;
           foreach($items as $item){ ?>
        
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1">
                    <img id="purchased" src="/assets/images/<?= $item['source'] ?>">
                </div>
                
                <div class="col-xs-6 col-md-4">                
                    <h2><?= $item['name'] ?></h2>
                    <h4><span class="title">Quantity:</span>
                    <form action='/products/update_cart' method='post'>
                        <select>
                            <?php for ($i = 1; $i <= 20; $i++) { ?>
                                <option <?php if($item['amount'] == $i) echo "selected = 'selected'"; ?> value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                        <input type="hidden" name="amount" value="<?= $item['amount'] ?>">

                    </form>
                    </h4>
                    <h4>
                        <span class="title">Price: </span>
                        $<?= number_format((float)$item['price'] * $item['amount'], 2, '.', '') ?>
                    </h4>
                    <?php $total += $item['price'] * $item['amount']; ?>
                    
                    <?php if($this->session->flashdata('newProduct') != NULL) {   
                            if($this->session->flashdata('newProduct')['id'] == $item['id']){ ?>
                        <p id="success"><i class="fa fa-check"></i>Item quantity succesfully changed!</p>
                    <?php }} ?>    
                    
                    
                    <p class="remove"><a href="/products/remove_from_cart/<?= $item['id'] ?>">Remove</a></p>
                </div>
            </div>
            <?php } ?>

        <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-md-offset-7">
                <h3 id="total">Cart subtotal: $<?= $total ?></h3>
            <a id='continue' href="/products/checkout"><button class="btn btn-success pull-right">
                Proceed to Checkout
                     </button></a>
                </div>
        </div>
    </div>
</body>