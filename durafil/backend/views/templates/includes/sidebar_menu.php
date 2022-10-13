<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>"><i class="menu-icon fa fa-cog" style="margin-left: 18px;"></i>Dashboard </a>
                </li>
                <?php if (!empty($_SESSION['sidebar_menuitems'])): ?>
                    <?php foreach ($_SESSION['sidebar_menuitems'] as $main_menus): ?>
                <?php //echo "<pre/>"; print_r($main_menus->submenus[0]->menuitem_link); ?>
                <li class="menu-item-has-children dropdown <?php echo (!empty($this->class_name) && !empty($main_menus->submenus[0]->menuitem_link) && $main_menus->submenus[0]->menuitem_link == $this->class_name) ? 'active' : ''; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-align-justify"></i><?php echo $main_menus->menuitem_text; ?></a>
                            <?php if (!empty($main_menus->submenus)): ?>
                                <ul class="sub-menu children  dropdown-menu">
                                    <?php foreach ($main_menus->submenus as $submenus): ?>
                                        <li><i class="menu-icon fa fa-dot-circle-o"></i><a href="<?php echo $submenus->menuitem_link; ?>"><?php echo $submenus->menuitem_text; ?></a></li>
                                            <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->