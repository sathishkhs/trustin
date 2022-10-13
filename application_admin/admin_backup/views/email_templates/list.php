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
                   		 <button type="button" class="btn defalut" data-dismiss="alert">
                        <i class="fa fa-remove"></i>
                    </button>
                   		 <i class="<?php echo $msg['icon']; ?>"></i>
                   		 <?php echo $msg['txt']; ?>
                    </div>
           		 <?php endif ?>
           		 <?php echo $this->pagination->create_links();?> 
                 <div class="box-header">
              <h3 class="box-title"></h3>
              <div class="box-tools">
              </div>
            </div>
	       	<div class="box-body table-responsive no-padding">
            <table id="emailtemplates-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Email Template Title</th>
                        <th width="130">Modified Date</th>
                        <th width="130">Modified By</th>
                        <th class="center">Status</th>
                        <th class="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row): ?>
                        <tr>                            
                            <td><?php echo $row->template_title; ?></td>
                            <td><?php if($row->last_modified_date==""){echo $row->created_date;}else{echo $row->last_modified_date;} ?></td>
                            <td><?php if($row->last_modified_by == 0){echo $row->created_user;}else{echo $row->last_modified_user;} ?></td>
                            <td class="center"><?php echo (!empty($row->status_ind)) ? "<span class='label label-success label-mini'>Active</span>" : "<span class='label label-warning label-mini'>INactive</span>"; ?></td>
                            <td class="td-actions">
                            	<div class="action-buttons">
                                    <a class="" title="Edit" href="<?php echo site_url('emailtemplates/edit/' . $row->template_id); ?>">
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;
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
	</section>
</section>	