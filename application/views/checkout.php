<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shipping and Billing</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }

          .form-horizontal input {
          	width: 350px;
          }

            .form-cc{
            	width: 600px;
            }

            .btn-default{
            	background: #8AC8FF;
            	color: #ffffff;
            
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
		
		<h3> Shipping Information</h3>

		<p>Click to <a href ="/users/signin"><b> sign in </b></a> or continue below as a guest: </p>
		 
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="firstname" class="col-sm-2 control-label">First Name:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="first_name" placeholder="First name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="lastname" class="col-sm-2 control-label">Last Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="last_name" placeholder="Last name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address1" class="col-sm-2 control-label">Address:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address" placeholder="Address...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address2" class="col-sm-2 control-label">Address 2:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address2" placeholder="Address 2...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="city1" class="col-sm-2 control-label">City:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="city" placeholder="City...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="state1" class="col-sm-2 control-label">State:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="state" placeholder="State...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="zipcode1" class="col-sm-2 control-label">Zipcode:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="zipcode" placeholder="Zipcode...">
		    </div>
		  </div>
		</form>

		<h3> Billing Information</h3>

		<div class="checkbox">
		    <label>
		      <input type="checkbox" id="sameas" onclick="sameAsShipping()">
     		 Same as Shipping</label>
		</div>

		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="firstname_b" class="col-sm-2 control-label">First Name:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="first_billing" placeholder="First name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="lastname_b" class="col-sm-2 control-label">Last Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="last_billing" placeholder="Last name...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address1_b" class="col-sm-2 control-label">Address:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address_billing" placeholder="Address...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="address2_b" class="col-sm-2 control-label">Address 2:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="address2_billing" placeholder="Address 2...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="city1_b" class="col-sm-2 control-label">City:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="city_billing" placeholder="City...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="state1_b" class="col-sm-2 control-label">State:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="state_billing" placeholder="State...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="zipcode1_b" class="col-sm-2 control-label">Zipcode:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="zipcode_billing" placeholder="Zipcode..."><br>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="card" class="col-sm-2 control-label">Card:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="card" placeholder="Card number...">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="code" class="col-sm-2 control-label">Code:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="code" placeholder="Security code...">
		    </div>
		  </div>

		  <div class="form-cc">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration:</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry-month" id="expiry-month">
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
              <select class="form-control" name="expiry-year">
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

      <br><button type="submit" class="btn btn-default">Pay</button>
	</form>
	</div>		
</body>
</html>