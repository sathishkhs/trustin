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
                <?php if ($this->permission[0] > 0) { ?>
                    <div class="pull-right"><a class="btn btn-outline-success  custom-btn" href='<?php echo $this->class_name; ?>/add'>Add New <?php echo $this->class; ?> <i class="menu-icon fa fa-plus-square"></i></a></div>
                <?php } ?>
            </div>
            <div class="card-body custom-list-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="30">S No</th>
                            <th width="150">Menu Type</th>
                            <th>Menu Name</th>
                            <th>Menu Link</th>
                            <th>Order</th>
                            <th width="140">Created Date</th>
                            <th width="40">Status</th>
                            <th width="50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($query)):
                            $i = 1;
                            ?>
                            <?php foreach ($query as $row): ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $row->menu_name; ?></td>
                                    <td><?php echo $row->menuitem_text; ?></td>
                                    <td><?php echo $row->menuitem_link; ?></td>
                                    <td><?php echo $row->display_order ?></td>
                                    <td><?php echo $row->created_date ?></td>
                                    <td align="center">
                                    <?php
                                        if ($row->status_ind == 1) {
                                            echo '<span class="btn btn-success btn-sm btn-block custom-sts">Active</span>';
                                        } else {
                                            echo '<span class="btn btn-danger btn-sm btn-block custom-sts">In Active</span>';
                                        }
                                        ?>    
                                    </td>
                                    <td align="center">
                                        <a href='<?php echo $this->class_name; ?>/edit/<?php echo $row->menuitem_id; ?>'><i class="fa fa-edit text-primary custom-icon" title="Edit" aria-describedby="ui-id-4"></i></a>
                                        <?php if ($this->permission[2] > 0) { ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/delete/<?php echo $row->menuitem_id; ?>' title="Delete"><i class="fa fa-trash text-danger custom-icon" title="Delete" aria-describedby="ui-id-4"></i></a>
                                            <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
