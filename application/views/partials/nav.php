<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
<?php if($this->session->userdata('style') == 0) { ?>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<?php } else { ?>
    <link rel="stylesheet" type="text/css" href="/assets/css/main2.css">
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>


<?php if($this->session->userdata('style') == 0) { ?>

<!-- Navigation - STICKER -->
<nav class="navbar header navbar-default">
    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img alt="logo" src="/assets/images/logo.png">
            </a>
            <a class="navbar-brand" id="company_name" href="/">Sticker <span id="black">Black</span> Market</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right" id="nav-right">
                <li><a href="/products/stickers/all">Show All Stickers</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                         aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if (!$this->session->userdata('id')) { ?>
                            <li><a href="/products/theme">Change Theme</a></li>
                            <li><a href="/users/signin">Sign In</a></li>
                        <?php } else { ?>
                            <li><a href="/products/theme">Change Theme</a></li>
                            <li><a href="/logoff">Log off</a></li>
                        <?php } ?>
                    </ul>
                </li> 
                <li id="cart"><a href="/products/cart" style="padding-top: 8px;"><i class="fa fa-shopping-cart fa-2x"></i> (<?= $this->session->userdata('cart_amount') ?>)</a></li>
            </ul>
  
        </div>
    </div>
</nav>

<?php } else { ?>

<!-- Navigation - STIKA -->
<nav class="navbar header navbar-default">
    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
            </a>
            <a class="navbar-brand" id="company_name" href="/"><span id="black">STICKA BLACK MARK3T</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right" id="nav-right">
                <li><a href="/products/stickers/all">Show All Stickers</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                         aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if (!$this->session->userdata('id')) { ?>
                            <li><a href="/products/theme">Change Theme</a></li>
                            <li><a href="/users/signin">Sign In</a></li>
                        <?php } else { ?>
                            <li><a href="/products/theme">Change Theme</a></li>
                            <li><a href="/logoff">Log off</a></li>
                        <?php } ?>
                    </ul>
                </li> 
                <li id="cart"><a href="/products/cart" style="padding-top: 8px;"><i class="fa fa-shopping-cart fa-2x"></i> (<?= $this->session->userdata('cart_amount') ?>)</a></li>
            </ul>
  
        </div>
    </div>
</nav>

<?php } ?>