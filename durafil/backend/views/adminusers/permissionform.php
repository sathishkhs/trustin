<div class="card">    
    <div class="overlay" id="loading_overlay" style="display:none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong>
        <div class="pull-right"><label> <span class="spandiv">User Name :</span><?php echo $users->username; ?></label></div>
    </div>
    <div class="card-body card-block">
        <div class="container" style="padding-right: 0px; padding-left: 0px;">
            <?php
            $msg = $this->session->flashdata('msg');
            if (!empty($msg['txt'])):
                ?>
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                    <button type="button" class="close" data-dismiss="alert"> X
                        <i class="icon-remove"></i>
                    </button>
                    <i class="<?php echo $msg['icon']; ?>"></i>
                    <?php echo $msg['txt']; ?>
                </div>
            <?php endif ?>
            <!-- Horizontal Form -->
            <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/savepermission" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo (!empty($user_id)) ? $user_id : "" ?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <div class="container" style="padding-right: 0px; padding-left: 0px;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="padding: 5px 2px 10px 2px">
                                    <div class="row to-content">
                                        <div class="col-xs-6 col-sm-6 col-md-6" style="padding-left: 0px;">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-4">
                                                    Permission Access <i class="fa fa-arrow-down"></i>
                                                </div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Add <i class="fa fa-arrow-down"></i></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Edit <i class="fa fa-arrow-down"></i></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Delete <i class="fa fa-arrow-down"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6" style="padding-left: 0px;">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-4">
                                                    Permission Access <i class="fa fa-arrow-down"></i>
                                                </div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Add <i class="fa fa-arrow-down"></i></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Edit <i class="fa fa-arrow-down"></i></div>
                                                <div class="col-xs-2 col-sm-2 col-md-2">Delete <i class="fa fa-arrow-down"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12" style="font-weight: bold; text-align: center; padding: 10px 0px 10px 0px;background: #f5f5f5;">
                                        <label> <span class="spandiv">Select all</span><input type="radio" name="multiple"  value="all" class="selectall"/></label>
                                        <label> <span class="spandiv">No Select all</span><input type="radio" name="multiple"  value="noall" class="selectall"/></label>
                                        <label> <span class="spandiv">Only Add</span><input type="radio" name="multiple" value="add" class="selectall"/></label>
                                        <label> <span class="spandiv">Only Edit</span><input type="radio" name="multiple"  value="edit" class="selectall"/></label>
                                        <label> <span class="spandiv">Only Delete</span><input type="radio" name="multiple"  value="delete" class="selectall"/></label>
                                        <label> <span class="spandiv">Add & Edit</span><input type="radio" name="multiple"  value="adde_dit" class="selectall"/></label>
                                    </div>
                                    <div class="control-group languagepanel">
                                        <div class="controls">
                                            <?php $i = 0; ?>
                                            <?php foreach ($query as $row): ?>
                                                <?php if (empty($row->parent_menuitem_id)) { ?>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 mainmenus" <?php echo (empty($row->parent_menuitem_id) ? 'style="display: inline-block;"' : '') ?>>
                                                    <?php } ?>

                                                    <div class="col-xs-6 col-sm-6 col-md-6 submenus" <?php echo (!empty($row->parent_menuitem_id) ? 'style="float:left"' : '') ?>>

                                                        <div class="row">
                                                            <div class="col-xs-6 col-sm-6 col-md-6 <?php echo (!empty($row->parent_menuitem_id) ? 'padding-left' : 'main-heading') ?>">
                                                                <p style="margin: 0 0 2px;"><span class="lbl"></span> <?php echo $row->menuitem_text; ?></p>
                                                            </div>
                                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                                <input class="childs" type="hidden" name="menuitem_id[]" value="<?php echo $row->menuitem_id; ?>"/>
                                                                <input class="childs allcheckbox add_permission" type="checkbox" name="add_permission[<?php echo $i; ?>]" value="1" <?php echo (!empty($row->add_permission)) ? 'checked' : ''; ?>/>
                                                            </div>
                                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                                <input class="childs allcheckbox edit_permission" type="checkbox" name="edit_permission[<?php echo $i; ?>]" value="1" <?php echo (!empty($row->edit_permission)) ? 'checked' : ''; ?>/>
                                                            </div>
                                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                                <input class="childs  allcheckbox delete_permission" type="checkbox" name="delete_permission[<?php echo $i; ?>]" value="1" <?php echo (!empty($row->delete_permission)) ? 'checked' : ''; ?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if (empty($row->parent_menuitem_id)) { ?>

                                                    </div>
                                                <?php } ?>
                                                <?php $i++; ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
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
