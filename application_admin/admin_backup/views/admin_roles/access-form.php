<<section class="content">
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
            <form class="form-horizontal" action="<?php echo base_url() ?>admin-roles/update" method="post">
                <div class="form-group">
                    <p class="text-right"><button class="btn btn-default"><i class="fa fa-plus"></i> <?php echo anchor('admin-roles/add', 'Add New Admin Roles'); ?></button></p>
                    <input type="hidden" name="role_id" id="role_id" value="<?php echo $role_id; ?>" />                    
                </div>              		
		<div class="form-group languagepanel">
		
                        <div class="controls">
	     <?php foreach ($query as $row1): 
                            if(isset($row1['parent'])){
                                $row = $row1['parent'];
                            ?>                          
                             <div class="col-lg-12" style="padding-bottom: 20px;">
                                <div class="col-lg-12">
                                    <input type="checkbox" name="menuitem_id[]" value="<?php echo $row->menuitem_id; ?>" <?php echo (in_array($row->menuitem_id, $admin_roles_accesses)) ? 'checked' : ''; ?> />
                                    <span class="lbl"></span> <b><?php echo $row->menuitem_text; ?></b>
                                </div>    
                                <div style="padding:15px;">
                            <?php 
                            if (isset($row1['child'])) {
                                foreach ($row1['child'] as $child_row) { ?>
                                    
                                        <div class="col-lg-6" style="" >
                                            <input type="checkbox" name="menuitem_id[]" value="<?php echo $child_row->menuitem_id; ?>" <?php echo (in_array($child_row->menuitem_id, $admin_roles_accesses)) ? 'checked' : ''; ?> />
                                            <span class="lbl"></span> <?php echo $child_row->menuitem_text; ?>
                                        </div>
                                    
                                <?php }
                            }
                            echo "</div> </div>";
                            }
                            endforeach ?>
		    </div>
		</div>



		
                <div class="form-actions form-btns">
                    <button class="btn btn-round btn-success" type="submit">
                        <i class="fa fa-check"></i>
                        Save Changes
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-round btn-default" type="reset">
                        <i class="fa fa-refresh"></i>
                        Reset
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <a href="admin-roles"> <button class="btn btn-warning btn-round" type="button">
                            <i class="fa fa-times"></i>
                            Back
                        </button></a>
                </div>
            </form>
           </div>
           	</div> 
           <div class="hr"></div>
        </div><!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
</section><!--/.row-fluid-->
</section>
