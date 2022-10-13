<?php $role_id = $this->session->userdata('role_id') ?>
<div class="card">
    <div class="overlay" id="loading_overlay" style="display:none;">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong> Form
    </div>
    <div class="card-body card-block">
        <div class="container">
            <!-- Horizontal Form -->
            <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/save" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="<?php echo (!empty($query->page_id)) ? $query->page_id : "" ?>"/>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="container">
                    <div class="rows centered-form">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group required">
                                                <label for="type_id">Page Type</label>
                                                <?php echo form_error('type_id'); ?>
                                                <select class="form-control" name="type_id" id="type_id" <?php echo ($role_id == 1) ? '' : 'readonly' ?>>
                                                    <?php foreach ($page_type as $row): ?>
                                                        <option value="<?php echo $row->type_id; ?>" <?php echo (!empty($query->type_id) && $row->type_id == $query->type_id) ? 'selected' : (empty($query->type_id) && $row->type_id == 20) ? 'selected' : ''; ?>><?php echo $row->type_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group required">
                                                <label for="page_title">Page Title</label>
                                                <?php echo form_error('page_title'); ?>
                                                <input type="text" name="page_title" id="page_title" class="form-control" placeholder="Page Title" value="<?php echo!empty($query->page_title) ? $query->page_title : ''; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-10 col-sm-10 col-md-12">
                                            <div class="form-group">
                                                <label for="username">Page Banner Image</label><br>
                                                <?php echo form_error('page_path'); ?>
                                                <input type="file" id="page_path" name="page_path"/>
                                                <span id="file_error" class="error"></span>
                                                <?php if (!empty($query->page_path) && file_exists('./' . PAGES_UPLOAD_PATH_THUMB . $query->page_path)) { ?>
                                                    <a class="cboxElement thumbnail" data-rel="colorbox" href="<?php echo PAGES_UPLOAD_PATH . $query->page_path; ?>">
                                                        <img src="<?php echo PAGES_UPLOAD_PATH_THUMB . $query->page_path; ?>" width="80"/>
                                                        <input type="hidden" name="page_path" id="page_path" value="<?php echo (!empty($query->page_path)) ? $query->page_path : ''; ?>"/>
                                                        <input type="hidden" id="isimgexit" value="1"/>
                                                    </a>
                                                <?php } ?>
                                                <p style="color:#4876ff">(Note : image size dimension should be 1350px width and 330px height (if you upload))</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="role_id">Page Content</label>
                                                <?php echo form_error('page_content'); ?>
                                                <textarea class="form-control ckeditor" rows="5" id="page_content" name="page_content" placeholder="Page Content" ><?php echo (!empty($query->page_content)) ? $query->page_content : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group required">
                                                <label for="role_id">Page Template</label>
                                                <?php echo form_error('template_id'); ?>
                                                <select class="form-control" name="template_id" id="template_id" >
                                                    <option value="">Select Template</option>
                                                    <?php foreach ($templates as $row): ?>
                                                        <option value="<?php echo $row->template_id; ?>" <?php echo (!empty($query->template_id) && $row->template_id == $query->template_id) ? 'selected' : ''; ?>><?php echo $row->template_name; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php $this->load->view('templates/includes/seo_section') ?>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group required">
                                                <label for="page_slug">Page Slug</label>
                                                <?php echo form_error('page_slug'); ?>
                                                <input type="text" name="page_slug" id="page_slug" class="form-control" placeholder="Page Slug" value="<?php echo!empty($query->page_slug) ? $query->page_slug : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?php echo $this->class_name; ?>" class="btn btn-warning">Cancel / Back</a>
                                    <button type="submit" class="btn btn-info pull-right" id="savebutton" onclick="javascript:$('#loading_overlay').show();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>