<!DOCTYPE html>
<html>
	<head>
		<title>Sign In</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>       
        <style type="text/css">

            .navbar {
                background-color: white;  
            }
            
            #login {
                display: block;
                width: 200px;
                padding: 10px 20px;
            }

                #login input {
                    margin-bottom: 10px;
                }

                #login h1 {
                    font-size: 150%;
                    margin: 20px 0px;
                }
            
                .margin-left {
                    margin-left: 20px;
                }
            
            #errors {
                color: red; 
                font-size: smaller;
                font-family: initial;
            }
            
                #errors p {
                    margin: 0px;
                }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>

            <!-- Sign in -->
            <div id="errors"><?= $this->session->flashdata('errors') ?></div>
            <form id="login" method="post" action="/users/signinUser">
                <h1>Sign in</h1>
                Email: <input type="text" name="email"><br>
                Password: <input type="text" name="password"><br>
                <input type='hidden' name='action' value='login'>
                <input class="formbutton btn btn-default" type="submit" value="Submit">
            </form>
            <p class="margin-left"><a href="register">Don't have an account? Register!</a></p>
            
        </div>
    </body>
</html>