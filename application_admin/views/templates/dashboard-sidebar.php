<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <?php $menuitems = $_SESSION['sidebar_menuitems']; 
        	  foreach ($menuitems as $menuitem):?>        	          
	        <li class="treeview">
	          <a href="<?php echo $menuitem->menuitem_link; ?>">
	            <i class="fa fa-edit"></i> <span><?php echo $menuitem->menuitem_text; ?></span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <?php if (count($menuitem->submenus) > 0): ?>
		          <ul class="treeview-menu">
		          	<?php foreach ($menuitem->submenus as $submenuitem): ?>
			            <li><a href="<?php echo $submenuitem->menuitem_link; ?>"><i class="fa fa-circle-o"></i><?php echo $submenuitem->menuitem_text; ?></a></li>
		            <?php endforeach; ?>
		          </ul>
	          <?php endif; ?>
	        </li>
        <?php endforeach; ?>
  </aside>