<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shipping and Billing</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">

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
</head>
    
<body>
	<div class="container">
            <?php $this->load->view('partials/nav'); 
            var_dump($newProduct); ?>
    </div>
</body>