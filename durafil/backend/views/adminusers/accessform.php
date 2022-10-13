<div class="card">
    <div class="overlay" id="loading_overlay" style="display:none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong>
        <div class="pull-right"><label> <span class="spandiv">User Name :</span><?php echo $users->username; ?></label></div>
    </div>
    <div class="card-body card-block" style="padding: 1.25em 0px;">
        <div class="container">
            <!-- Horizontal Form -->
            <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/saveaccess" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo (!empty($user_id)) ? $user_id : "" ?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="panel panel-default">
                            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                                <label> <span class="spandiv">Select all</span><input type="radio" name="multiple" id="multiple" value="all" class="selectall"/></label>
                                <label> <span class="spandiv">De Select all</span><input type="radio" name="multiple" id="multiple" value="noall" class="selectall"/></label>
                            </div>
                            <div class="panel-body">
                                <div class="control-group languagepanel">
                                    <div class="controls">
                                        <div class="card-header" style="margin-bottom: 26px; background-color:#222d32; color: #fff;">
                                            <strong class="card-title"> <h4>Left Menu list permissions</h4></strong>
                                        </div>
                                        <div class="row">
                                            <?php $i = 1; ?>
                                            <?php foreach ($query as $row): ?>
                                                <div class="col-xs-4 col-sm-4 col-md-4 mainmenus-2 left-menus" style="border-top: 0px solid #d2d6de;">
                                                    <ul>
                                                        <li><?php echo $i . ')'; ?> &nbsp;&nbsp;<input class="parents allcheckbox" type="checkbox" id='main_menu_<?php echo $row->menuitem_id; ?>' name="menuitem_id[]" value="<?php echo $row->menuitem_id; ?>" <?php echo (in_array($row->menuitem_id, $admin_users_accesses)) ? 'checked' : ''; ?> />
                                                            <label style="font-weight: normal; margin-bottom: 0px; display: inline;" for='main_menu_<?php echo $row->menuitem_id; ?>'><span class="lbl"></span> <?php echo $row->menuitem_text; ?></label>
                                                            <ul>
                                                                <?php if (!empty($row->submenus)): ?>
                                                                    <?php foreach ($row->submenus as $row): ?>
                                                                        <li>
                                                                            <input class="childs allcheckbox" type="checkbox" name="menuitem_id[]" id='submenu_<?php echo $row->menuitem_id; ?>' value="<?php echo $row->menuitem_id; ?>" <?php echo (in_array($row->menuitem_id, $admin_users_accesses)) ? 'checked' : ''; ?> />
                                                                            <label style="font-weight: normal; margin-bottom: 0px; display: inline;" for='submenu_<?php echo $row->menuitem_id; ?>'><span class="lbl"></span> <?php echo $row->menuitem_text; ?></label>
                                                                        </li>
                                                                    <?php endforeach ?>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="box-footer">
                                <br><br>
                                <a href="<?php echo $this->class_name; ?>" class="btn btn-warning">Cancel / Back</a>
                                <button type="submit" class="btn btn-info pull-right" onclick="javascript:$('#loading_overlay').show();">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
