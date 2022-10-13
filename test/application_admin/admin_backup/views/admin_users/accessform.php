<section class="content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<!-- Horizontal Form -->
	          <div class="box box-info">
            <?php
            $msg = $this->session->flashdata('msg');
            if (!empty($msg['txt'])):
                ?>
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <i class="<?php echo $msg['icon']; ?>"></i>
                    <?php echo $msg['txt']; ?>
                </div>
            <?php endif ?>
            <div class="box-header with-border">
            <form class="form-horizontal" action="admin-users/saveaccess" method="post">
                <input name="user_id" type="hidden" value="<?php echo $user_id; ?>"  />
                    <div class="control-group languagepanel">
                        <div class="form-controls">
						<?php //echo "<pre>";print_r($admin_users_accesses); die(); ?>
						<?php foreach ($query as $row): ?>
						<label class="col-sm-4 col-md-4">
                            <input type="checkbox" name="menuitem_id[]" value="<?php echo $row->menuitem_id; ?>" <?php echo (in_array($row->menuitem_id, $admin_users_accesses)) ? 'checked' : ''; ?> />
                            <span class="label label-primary"></span> <?php echo $row->menuitem_text; ?>
						</label>    
						<?php endforeach ?>
                        </div>
                    </div>
            		<br />
                <div class="form-actions form-btns">
                    <button class="btn btn-round btn-success" type="submit">
                        <i class="fa fa-times"></i>
                        Save Changes
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-round btn-default" type="reset">
                        <i class="fa fa-refresh"></i>
                        Reset
                    </button>
                </div>
            	</form>
            </div>
            	</div>
            <div class="hr"></div>
        </div><!--PAGE CONTENT ENDS-->
    </section><!--/.span-->
</section><!--/.row-fluid-->