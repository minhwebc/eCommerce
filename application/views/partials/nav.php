<!-- Navigation -->
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
                <form class="navbar-form navbar-left" role="search">
                     <div class="form-group">
                         <input type="text" class="form-control" placeholder="Find a product...">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                         aria-haspopup="true" aria-expanded="false">Your Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if (!$this->session->userdata('id')) { ?>
                            <li><a href="/users/signin">Sign In</a></li>
                            <li><a href="/users/register">Register</a></li>
                        <?php } else { ?>
                            <li><a href="/orders">Your Orders</a></li>
                            <li><a href="/users/account">Account Settings</a></li>
                            <li><a href="/logoff">Log off</a></li>
                        <?php } ?>
                    </ul>
                </li> 
                <li id="cart"><a href="#">Shopping Cart (0)</a></li>
            </ul>
  
        </div>
    </div>
</nav>