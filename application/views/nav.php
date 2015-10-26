<!-- Navigation -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">eCommerce</a>
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
                         <input type="text" class="form-control" placeholder="Find a user...">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <?php if ($this->session->userdata('email') == NULL) { ?>
                    <li><a href="signin">Sign In</a></li>
                <?php } else { ?>
                    <li><a href="/main/logoff">Log off</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>