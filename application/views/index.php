<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">         
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('nav'); ?>

            <!-- Hero Unit -->
            <div class="jumbotron">
                  <h1>Welcome to eCommerce</h1>
                  <p>This is an eCommerce website created using the CodeIgniter MVC framework in PHP, 
                      designed with Twitter Bootstrap.</p>
                    <?php if ($this->session->userdata('email') == NULL) { ?>
                        <p><a class="btn btn-default btn-lg" href="register" role="button">Register</a></p>
                    <?php } ?>
            </div>
        </div> 
    </body>
</html>