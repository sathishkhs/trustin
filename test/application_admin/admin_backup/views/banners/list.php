<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form method="post" action="">
					<?php
					$msg = $this->session->flashdata('msg');
					if (!empty($msg['txt'])) :
					?>
						<div class="alert alert-block alert-<?php echo $msg['type']; ?>">
							<button type="button" class="btn defalut" data-dismiss="alert">
								<i class="fa fa-remove"></i>
							</button>
							<i class="<?php echo $msg['icon']; ?>"></i>
							<?php echo $msg['txt']; ?>
						</div>
					<?php endif ?>

					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
								<div class="row">

									<div class="col-sm-12 col-md-2 ml-auto mb-2">
										<div id="example1_filter" class="dataTables_filter">
											<!-- <a href="master/banner_add" class=" btn btn-primary" placeholder="" aria-controls="example1">Add New Banner</a> -->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table id="banner_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
											<thead>
												<tr role="row">
													<th>#</th>
													<th>Banner Title</th>
													<th>Created Date</th>
													<th width="10%">Banners</th>
													<th>Modified Date</th>
													<th>Modified By</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $sno = 1; ?>
												<?php if (!empty($query)) : ?>
													<?php foreach ($query as $row) : ?>
														<tr>
															<td><?php echo $sno; ?></td>
															<td><?php echo $row->banner_top_text; ?></td>
															<td align="center"><?php echo $row->created_date; ?></td>
															<td align="center">
																<?php if (!empty($row->banner_background_img_path) && file_exists('./' . BANNERS_PHOTO_UPLOAD_PATH . $row->banner_background_img_path)) { ?>

																	<img src="<?php echo BANNERS_PHOTO_UPLOAD_PATH . $row->banner_background_img_path; ?>" width="50"></a>
																<?php } ?>
															</td>
															<td align="center">
																<?php
																if ($row->last_modified_date == "" || $row->last_modified_date == '0000-00-00 00:00:00') {
																	echo date("Y-m-d", strtotime($row->created_date));
																} else {
																	echo date("Y-m-d", strtotime($row->last_modified_date));
																}
																?>
															</td>
															<td>
																<?php
																if ($row->last_modified_by == 0) {
																	echo $row->created_by;
																} else {
																	echo $row->last_modified_by;
																}
																?>
															</td>
															<td align="center"><?php echo (!empty($row->status_ind)) ? '<i class="fa fa-check-circle text-green" title="Active"></i>' : '<i class="fa  fa-times-circle text-red" title="Deactive"></i>'; ?></td>
															<td align="center">
																<a href='master/banner_edit/<?php echo $row->banner_id; ?>'><i class="fa fa-edit" title="Edit" aria-describedby="ui-id-4"></i></a>
																&nbsp;&nbsp;&nbsp;&nbsp;<a href='master/banner_delete/<?php echo $row->banner_id; ?>/<?php echo $row->banner_path ?>' onclick="return delete_action();" title="Delete"><i class="fa fa-trash" title="Delete" aria-describedby="ui-id-4"></i></a>
															</td>
														</tr>
														<?php $sno++; ?>
													<?php endforeach; ?>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>