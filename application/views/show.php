<!DOCTYPE html>
<html>
	<head>
		<title>Our Product</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>      
        <style type="text/css">
            
            .navbar {
                background-color: white;  
            }
            
            h1 {
                font-size: 150%;
            }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('partials/nav-admin'); ?>
            <div class="row">
              <div class="col-md-4">Image</div>
              <div class="col-md-8">Description</div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-8">Price</div>
            </div>
            <div class="row">
              <div class="col-md-2">.col-md-1</div>
              <div class="col-md-2">.col-md-1</div>
              <div class="col-md-2">.col-md-1</div>
              <div class="col-md-2">.col-md-1</div>
              <div class="col-md-2">.col-md-1</div>
              <div class="col-md-2">.col-md-1</div>
            </div>
            
        </div> 
    </body>
</html>