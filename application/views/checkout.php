<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shipping and Billing</title>
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }
		
          .form-horizontal input {
          	width: 350px;
          }

            .form-cc input{
            	width: 350px;
            }

            .btn-default{
            	background: #8AC8FF;
            	color: #ffffff;
            	position: relative;
            }

            #continue{
            	color: white;
            }
            #total{
            	text-align: right;
            }
            #pay{
            	width: 80px;
            	margin-top: 20px;
            	margin-right: 400px;
            }

            form{
            	width: 80%;
            }

        </style>
	<script>
		function sameAsShipping(){
			if($('#sameas').is(":checked")){
				$("#first_billing").val($("#first_name").val());
				$("#last_billing").val($("#last_name").val());
				$("#address_billing").val($("#address").val());
				$("#address2_billing").val($("#address2").val());
				$("#city_billing").val($("#city").val());
				$("#state_billing").val($("#state").val());
				$("#zipcode_billing").val($("#zipcode").val());
			}
		}		
		</script>
</head>
<body>
	<div class="container">
            <?php $this->load->view('partials/nav'); ?>
	
	<h2> Shopping cart</h2>
	<div class="table-responsive"> 
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            	$total = 0;
            	foreach($items as $item){
            ?>
            	<tr>
	            	<td><?= $item['name'] ?></td>
	            	<td>$<?= $item['price'] ?></td>
	            	<td><?= $item['amount'] ?></td>
	            	<td>$<?php $total += $item['price']*$item['amount']; echo $item['price']*$item['amount']; ?></td>
	            </tr>
            <?php } ?>
        </tbody>
    </table>
    <h3 id="total">Total: $<?= $total ?></h3>
    <button class="btn btn-success pull-right"><a id='continue' href="/">Continue Shopping</a></button>
</div>

		<h2> Shipping Information</h2>

		<p>Click to <a href ="/users/signin"><b> sign in </b></a> or continue below as a guest: </p>
		 
		<form class="form-horizontal" action="/orders/pay/<?= $total ?>" method="post">
		  <div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">First Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="first_name" name="ship_first_name" placeholder="First name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="lastname" class="col-sm-2 control-label">Last Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="last_name" name="ship_last_name" placeholder="Last name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address1" class="col-sm-2 control-label">Address:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address" name="ship_address" placeholder="Address...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address2" class="col-sm-2 control-label">Address 2:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address2" name="ship_address2" placeholder="Address 2...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="city1" class="col-sm-2 control-label">City:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="city" name="ship_city" placeholder="City...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="state1" class="col-sm-2 control-label">State:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="state" name="ship_state" placeholder="State...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="zipcode1" class="col-sm-2 control-label">Zipcode:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="zipcode" name="ship_zipcode" placeholder="Zipcode...">
		    </div>
		  </div>

		<h2> Billing Information</h2>

		<div class="checkbox">
		    <input type="checkbox" id="sameas" onclick="sameAsShipping()"><label>Same as Shipping</label>
		</div>

		  <div class="form-group">
		    <label for="firstname_b" class="col-sm-2 control-label">First Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="first_billing" name="bill_first_name" placeholder="First name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="lastname_b" class="col-sm-2 control-label">Last Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="last_billing" name="bill_last_name" placeholder="Last name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address1_b" class="col-sm-2 control-label">Address:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address_billing" name="bill_address" placeholder="Address...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address2_b" class="col-sm-2 control-label">Address 2:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address2_billing" name="bill_address2" placeholder="Address 2...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="city1_b" class="col-sm-2 control-label">City:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="city_billing" name="bill_city" placeholder="City...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="state1_b" class="col-sm-2 control-label">State:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="state_billing" name="bill_state" placeholder="State...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="zipcode1_b" class="col-sm-2 control-label">Zipcode:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="zipcode_billing" name="bill_zipcode" placeholder="Zipcode..."><br>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="card" class="col-sm-2 control-label">Card:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="card" name="card_num" placeholder="Card number...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="code" class="col-sm-2 control-label">Code:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="code" name="security_code" placeholder="Security code...">
		    </div>
		  </div>

		<div class="form-cc">
	        <label class="col-md-2 control-label" for="expiry-month">Expiration:</label>
	        <div class="col-sm-9" style="padding-left: 5px;">
	          <div class="row">
	            <div class="col-xs-3">
	              <select class="form-control col-sm-2" name="expiry_month" id="expiry-month">
	                <option>Month</option>
	                <option value="01">Jan (01)</option>
	                <option value="02">Feb (02)</option>
	                <option value="03">Mar (03)</option>
	                <option value="04">Apr (04)</option>
	                <option value="05">May (05)</option>
	                <option value="06">June (06)</option>
	                <option value="07">July (07)</option>
	                <option value="08">Aug (08)</option>
	                <option value="09">Sep (09)</option>
	                <option value="10">Oct (10)</option>
	                <option value="11">Nov (11)</option>
	                <option value="12">Dec (12)</option>
	              </select>
	            </div>
	            <div class="col-xs-3">
	              <select class="form-control" name="expiry_year">
	                <option value="13">2013</option>
	                <option value="14">2014</option>
	                <option value="15">2015</option>
	                <option value="16">2016</option>
	                <option value="17">2017</option>
	                <option value="18">2018</option>
	                <option value="19">2019</option>
	                <option value="20">2020</option>
	                <option value="21">2021</option>
	                <option value="22">2022</option>
	                <option value="23">2023</option>
	              </select>
	            </div>
	          </div>
	        </div>
      	</div>
		<input id="pay" type="submit" class="btn btn-success pull-right" value="Pay">
	</form>
	</div>		
</body>
</html>