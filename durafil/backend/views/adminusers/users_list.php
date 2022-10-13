<div class="panel-body">
    <div class="col-md-12 no-padding">
        <?php
        $msg = $this->session->flashdata('msg');
        if (!empty($msg['txt'])):
            ?>
            <div class="sufee-alert alert with-close alert-<?php echo $msg['type']; ?> alert-dismissible fade show">
                <?php echo $msg['txt']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-header">
                <strong class="card-title"></strong>
                <?php  if ($this->session->userdata('role_id') == 1) { ?>
                    <div class="pull-right"><a class="btn btn-outline-success  custom-btn" href='<?php echo $this->class_name; ?>/add'>Add New <?php echo $this->class; ?> <i class="menu-icon fa fa-plus-square"></i></a></div>
                <?php }  ?>
            </div>
            <div class="card-body custom-list-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S No</th>
                            <th>Full Name</th>
                            <th>Email id/ Username</th>
                            <th>User Role</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($query)):
                            $i=0;
                            ?>
                            <?php foreach ($query as $row):                                
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->first_name . ' ' . $row->last_name; ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->role_name ?></td>
                                    <td><?php echo $row->created_date ?></td>
                                    <td align="center"><?php echo (!empty($row->status_ind)) ? '<i class="fa fa-check-circle text-success custom-icon" title="Active"></i>' : '<i class="fa  fa-times-circle text-danger custom-icon" title="Deactive"></i>'; ?></td>
                                    <td align="center">
                                        <a href='<?php echo $this->class_name; ?>/edit/<?php echo $row->user_id; ?>'><i class="fa fa-edit text-primary custom-icon" title="Edit" aria-describedby="ui-id-4"></i></a>
                                        <?php if ($this->permission[2] > 0) { ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/delete/<?php echo $row->user_id; ?>' title="Delete"><i class="fa fa-trash text-danger custom-icon" title="Delete" aria-describedby="ui-id-4"></i></a>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/access/<?php echo $row->user_id; ?>'><i class="fa fa-eye text-primary custom-icon" title="Menu Access " aria-describedby="ui-id-4"></i></a>
                                            <!--&nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/permission/<?php echo $row->user_id; ?>'><i class="fa fa-cog text-primary custom-icon" title="Permission Access" aria-describedby="ui-id-4"></i></a>-->
                                       <?php } ?>
                                    </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>