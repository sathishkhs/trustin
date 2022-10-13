<div class="card">
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong> Form
    </div>
    <div class="card-body card-block">
        <div class="container">
            <!-- Horizontal Form -->
            <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/save" enctype="multipart/form-data">
                <input type="hidden" name="menuitem_id" value="<?php echo (!empty($query->menuitem_id)) ? $query->menuitem_id : "" ?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="container">
                    <div class="row centered-form">
                        <div class="col-xs-11 col-sm-11 col-md-11 col-sm-offset-2 col-md-offset-0">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group required">
                                                <label for="role_id">Manu Type</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group required">
                                                <?php echo form_error('menu_id'); ?>
                                                <select class="form-control" name="menu_id" id="menu_id" >
                                                    <option value="">Select Menu Type</option>
                                                    <?php foreach ($menu as $row): ?>
                                                        <option value="<?php echo $row->menu_id; ?>" <?php echo (!empty($query->menu_id) && $row->menu_id == $query->menu_id) ? 'selected' : ''; ?>><?php echo $row->menu_name; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row main_menuitem">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group required">
                                                <label for="role_id">Main Menuitem</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group required">
                                                <?php echo form_error('menuitem_id'); ?>
                                                <select class="form-control" name="parent_menuitem_id" id="parent_menuitem_id" choosen="<?php echo (!empty($query->parent_menuitem_id)) ? $query->parent_menuitem_id : ''; ?>" >
                                                    <option value="">Select Menuitem</option>
                                                    <?php foreach ($main_menu as $row): ?>
                                                        <option value="<?php echo $row->menuitem_id; ?>" <?php echo (!empty($query->parent_menuitem_id) && $row->menuitem_id == $query->parent_menuitem_id) ? 'selected' : ''; ?>> <?php echo strtoupper($row->menuitem_text); ?> </option>
                                                        <?php foreach ($row->submenu as $row2): ?>
                                                            <option value="<?php echo $row2->menuitem_id; ?>" <?php echo (!empty($query->parent_menuitem_id) && $row->menuitem_id == $query->parent_menuitem_id) ? 'selected' : ''; ?>>&nbsp;&nbsp; &raquo; <?php echo strtolower($row2->menuitem_text); ?></option>
                                                        <?php endforeach ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group required">
                                                <label for="role_id">Menu Name</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group required">
                                                <?php echo form_error('menuitem_text'); ?>
                                                <input type="text" name="menuitem_text" id="menuitem_text" class="form-control" placeholder="Menu Name" value="<?php echo (!empty($query->menuitem_text)) ? $query->menuitem_text : '' ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group required">
                                                <label for="role_id">Menu Link</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group required">
                                                <?php echo form_error('menuitem_link'); ?>
                                                <input type="text" name="menuitem_link" id="menuitem_link" class="form-control" placeholder="Menu Link" value="<?php echo (!empty($query->menuitem_link)) ? $query->menuitem_link : '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group required">
                                                <label for="role_id">Display Order</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group required">
                                                <?php echo form_error('display_order'); ?>
                                                <input type="text" name="display_order" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo (!empty($query->display_order)) ? $query->display_order : '' ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <label for="status_ind">Menu Item Target</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label><input name="menuitem_target" value="_blank" type="radio"  <?php
                                                    if (!empty($query->menuitem_target) && $query->menuitem_target == '_blank') {
                                                        echo 'checked';
                                                    }
                                                    ?>/>
                                                    <span class="lbl">New Window</span></label>
                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                <label><input name="menuitem_target" value="_self" type="radio" <?php
                                                    if (empty($query->menuitem_target) || (!empty($query->menuitem_target) && $query->menuitem_target == '_self')) {
                                                        echo 'checked';
                                                    }
                                                    ?> />
                                                    <span class="lbl">Same Window</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-2 col-sm-2 col-md-2">
                                            <div class="form-group">
                                                <label for="status_ind">Status</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label><input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind) && $query->status_ind == 1) ? 'checked' : ''; ?> />
                                                    <span class="lbl">Active</span></label>
                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                <label><input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                                    <span class="lbl">In Active</span></label> &nbsp; &nbsp; &nbsp;&nbsp;
                                                <?php if ((!empty($query->status_ind) && $query->status_ind == 2)) { ?>
                                                    <label><input name="status_ind" value="0" type="radio" <?php echo (!empty($query->status_ind) && $query->status_ind == 2) ? 'checked' : ''; ?> />
                                                        <span class="lbl">Rejected</span></label>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?php echo $this->class_name; ?>" class="btn btn-warning">Cancel / Back</a>
                                    <button type="submit" class="btn btn-info pull-right" onclick="javascript:$('#loading_overlay').show();">Save</button>
                                </div>
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