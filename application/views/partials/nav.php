<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<!-- Navigation -->
<nav class="navbar header navbar-default">
    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
            </a>
            <a class="navbar-brand" id="company_name" href="/"><span id="black">STICKAS BLACK MARK3T</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right" id="nav-right">
                <li><a href="/products/all">Show All Stickers</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                         aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if (!$this->session->userdata('id')) { ?>
                            <li><a href="/users/signin">Sign In</a></li>
                            <li><a  href="/users/register">Register</a></li>
                        <?php } else { ?>
                            <li><a  href="/logoff">Log off</a></li>
                        <?php } ?>
                    </ul>
                </li> 
                <li id="cart"><a href="/products/cart" style="padding-top: 8px;"><i class="fa fa-shopping-cart fa-2x"></i> (<?= $this->session->userdata('cart_amount') ?>)</a></li>
            </ul>
  
        </div>
    </div>
</nav>