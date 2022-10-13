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
                            <th>Page Title</th>
                            <th>Page Type</th>
                            <th>Page Slug</th>
                            <th width="130">Updated Date</th>
                            <th width="50">Status</th>
                            <th width="80">Action</th>
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
                                    <td><?php echo $row->page_title; ?></td>
                                    <td><?php echo $row->type_name; ?></td>
                                    <td><?php echo $row->page_slug; ?></td>
                                    <td><?php echo (!empty($row->last_modified_date)) ? $row->last_modified_date : $row->created_date; ?></td>
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
                                        <?php if ($row->status_ind != 2) { ?>
                                            <a href='<?php echo $this->class_name; ?>/edit/<?php echo $row->page_id; ?>'><i class="fa fa-edit text-primary custom-icon" title="Edit" aria-describedby="ui-id-4"></i></a>
                                            &nbsp;&nbsp;<a target="_blank" href='<?php echo base_url() . '../' . $row->page_slug; ?>?preview=yes'><i class="fa fa-eye text-primary custom-icon" title="Preview" aria-describedby="ui-id-4"></i></a>
                                        <?php } ?>
                                        <?php if ($row->type_id == 20) { ?>
                                            <?php if ($this->permission[2] > 0) { ?>
                                                &nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/delete/<?php echo $row->page_id; ?>' title="Delete"><i class="fa fa-trash text-danger custom-icon" title="Delete" aria-describedby="ui-id-4"></i></a>
                                                <?php } ?>
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
