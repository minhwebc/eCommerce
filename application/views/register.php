<!DOCTYPE html>
<html>
	<head>
		<title>UserDash | Register</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">         
        <style type="text/css">

            .navbar {
                background-color: white;  
            }
            
            #register {
                display: block;
                width: 200px;
                padding: 0px 20px;
            }

                #register input {
                    margin-bottom: 10px;
                }

                #register h1 {
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


            <!-- Registration -->
            <div id="errors"><?= $this->session->flashdata('errors') ?></div>
            <form id="register" method="post" action="registerUser">
                <h1>Registration</h1>
                Email: <input type="text" name="email"><br>
                First name: <input type="text" name="first_name"><br>
                Last name: <input type="text" name="last_name"><br>
                Password: <input type="text" name="password"><br>
                Confirm Password: <input type="text" name="confirm"><br>
                <input type='hidden' name='action' value='register'>
                <input class="button" type="submit" value="Submit"/>
            </form>
            <p class="margin-left"><a href="signin">Already have an account? Login!</a></p>
            
        </div>
    </body>
</html>