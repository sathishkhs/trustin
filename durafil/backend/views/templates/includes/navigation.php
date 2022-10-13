<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand"><?php echo SITE_TITLE_2; ?></a>
            <a class="navbar-brand hidden" ><?php echo SITE_TITLE; ?></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">

                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="includes/images/admin.jpg" alt="User Avatar">
                    </a>
                    <div class="user-menu dropdown-menu" style="min-width: 210px;">
                        <a class="nav-link" ><i class="fa fa -cog"></i><?php echo 'User: ' . $this->session->userdata['first_name'] ?></a>
                        <a class="nav-link" href="adminusers_profile/index/<?php echo $this->session->userdata('user_id'); ?>"><i class="fa fa- user"></i>My Profile</a>
                        <a class="nav-link" href="logout"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

