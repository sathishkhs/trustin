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
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $page_heading; ?></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <p class="text-right"><button class="btn btn-default"><i class="fa fa-plus"></i> <?php echo anchor('specialities/add', 'Add New Speciality'); ?></button></p>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table id="specialities_table" class="table table-striped table-condensed table-hover">
                            <thead>
                                <tr>
                                <th>Speciality Name</th>
                                <th>Speciality Slug</th>
                                <th>Created Date</th>
                                <th class="center">Status</th>
                                <th class="center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query as $row): ?>
                                        <tr>
                                            <td><?php echo $row->speciality_name; ?></td>
                                            <td><?php echo $row->speciality_slug; ?></td>
                                            <td><?php
                                                if ($row->modified_date == "") {
                                                    echo $row->created_date;
                                                } else {
                                                    echo $row->modified_date;
                                                }
                                                ?></td>
                                            <td class="center"><?php echo(!empty($row->status_ind)) ? "<span class='label label-success label-mini'>Active</span>" : "<span class='label label-warning label-mini'>In Active</span>"; ?></td>
                                            <td class="td-actions">
                                                <div class="action-buttons">
                                                    <a class="" title="Edit" href="<?php echo site_url('specialities/edit/' . $row->speciality_id); ?>">
                                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>&nbsp;
                                                    <a class="red" title="Delete" href="<?php echo site_url('specialities/delete/' . $row->speciality_id); ?>">
                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a>
                                                </div>
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