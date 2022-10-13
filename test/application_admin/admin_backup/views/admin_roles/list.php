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
            <div class="box-header">
              <h3 class="box-title"></h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                	<p class="text-right"><button class="btn btn-default"><i class="fa fa-plus"></i> <?php echo anchor('admin-roles/add', 'Add New Admin Roles'); ?></button></p>
                </div>
              </div>
            </div>
            <?php echo $this->pagination->create_links();?> 
         <div class="box-body table-responsive no-padding">
            <table id="admin-roles-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                        <th class="center">Admin Roles Name</th>
                        <th class="center">Modified Date</th>
                        <th class="center">Modified By</th>
                        <th class="center">Status</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row): ?>
                        <tr>
                            <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                            <td class="center"><?php echo $row->role_name; ?></td>
                            <td><?php if($row->modified_date==""){echo $row->created_date;}else{echo $row->modified_date;} ?></td>
                            <td><?php if($row->last_modified_by == 0){echo $row->created_user;}else{echo $row->last_modified_user;} ?></td>
                            <td class="center"><?php echo (!empty($row->status_ind)) ? "<span class='label label-success label-mini'>Active</span>" : "<span class='label label-warning label-mini'>Inactive</span>"; ?></td>
                            <td class="td-actions">
                                <div class="action-buttons">
                                   <a class=""  title="Edit" href="<?php echo site_url('admin-roles/edit/' . $row->role_id); ?>">
                                   	<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;
                                   <a class="red"  href="<?php echo site_url('admin-roles/delete/' . $row->role_id); ?>">
                                   	<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>&nbsp;
                                   <a class="" title="Access" href="<?php echo site_url('admin-roles/access/' . $row->role_id); ?>">
                                   	<button class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></button></a>&nbsp;
                                </div>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
           </div>  
         </div>      
	        	</div>
			</div>	
	    </div>	
	</section>
</section>