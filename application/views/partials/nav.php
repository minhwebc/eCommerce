<!-- Navigation -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Dojo eCommerce</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                <?php if ($this->session->userdata('id')) { ?>
                    <li><a href="/dashboard">Dashboard</a></li>
                 <?php } ?>
                 <?php if ($this->session->userdata('id')) { ?>
                    <li><a href="/users/show/<?= $this->session->userdata('id') ?>">Profile</a></li>
                 <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
                        <?php if ($this->session->userdata('email') == NULL) { ?>
                            <li><a href="signin">Sign In</a></li>
                            <li><a href="register">Register</a></li>
                        <?php } else { ?>
                            <li><a href="/main/logoff">Log off</a></li>
                        <?php } ?>
                    </ul>
                </li> 
            </ul>
        </div>
    </div>
</nav>