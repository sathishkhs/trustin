<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
                    </div>
                    <!-- Horizontal Form -->
                    <form class="form-horizontals" method="post" id="settings_form" name="settings_form" action="master/settings_update" enctype="multipart/form-data">
                        <div class="card-body">

                            <?php foreach ($query as $row) : ?>
                                <input type="hidden" name="setting_id[<?php echo $row->setting_id; ?>]" value="<?php echo $row->setting_id; ?>" />
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="<?php echo $row->setting_name; ?>"><?php echo $row->setting_name; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <?php if ($row->type == 'image') : ?>
                                                <input type="file" name="setting_value_<?php echo $row->setting_id; ?>" id="setting_value_<?php echo $row->setting_id; ?>" class="form-control" placeholder="<?php echo $row->setting_name; ?>">
                                                <?php if (!empty($row->setting_value) && file_exists( SETTINGS_UPLOAD_PATH . $row->setting_value)) : ?>
                                                   
                                                        <img src="<?php echo SETTINGS_UPLOAD_PATH . $row->setting_value; ?>" width="80" />
                                                    </a>
                                                    <input name="setting_value[<?php echo $row->setting_id; ?>]" type="hidden" value="<?php echo $row->setting_value; ?>" />
                                                <?php endif; ?>
                                            <?php elseif ($row->type == 'videoimage') : ?>
                                                <input type="file" name="setting_value_<?php echo $row->setting_id; ?>" id="setting_value_<?php echo $row->setting_id; ?>" class="form-control" placeholder="<?php echo $row->setting_name; ?>">
                                                <?php if (!empty($row->setting_value) && file_exists(SETTINGS_UPLOAD_PATH_VIDEO_IMAGE . $row->setting_value)) : ?>
                                                    
                                                        <img src="<?php echo SETTINGS_UPLOAD_PATH_VIDEO_IMAGE . $row->setting_value; ?>" width="80" />
                                                    </a>
                                                    <input name="setting_value[<?php echo $row->setting_id; ?>]" type="hidden" value="<?php echo $row->setting_value; ?>" />
                                                <?php endif; ?>
                                            <?php elseif ($row->type == 'textarea') : ?>
                                                <textarea name="setting_value[<?php echo $row->setting_id; ?>]" placeholder="<?php echo $row->setting_name; ?>" class="form-control"><?php echo $row->setting_value; ?></textarea>
                                            <?php elseif ($row->type == 'radiobutton') : ?>
                                                <input name="setting_value[<?php echo $row->setting_id; ?>]" value="1" type="radio" <?php echo (!empty($row->setting_value) && $row->setting_value == 1) ? 'checked' : ''; ?> />
                                                <span class="lbl">Yes</span>
                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                <input name="setting_value[<?php echo $row->setting_id; ?>]" value="2" type="radio" <?php echo (!empty($row->setting_value) && $row->setting_value == 2) ? 'checked' : ''; ?> />
                                                <span class="lbl">No</span>
                                            <?php else : ?>
                                                <input class="form-control" name="setting_value[<?php echo $row->setting_id; ?>]" type="text" placeholder="<?php echo $row->setting_name; ?>" value="<?php echo $row->setting_value; ?>" />
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn btn-default" type="reset">
                                <i class="fa fa-refresh"></i>Reset</button>
                            &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;
                            <a href="master/settings">
                                <button class="btn btn-warning " type="button">
                                    <i class="fa fa-times"></i>Back</button></a>
                        </div>

                    </form>
                </div>
                <!-- /.card -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

