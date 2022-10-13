<div class="card">
    <div class="card-header">
        <strong><?php echo $page_heading; ?></strong>
        <p class="pull-right"><a href='adminusers/edit/<?php echo $query->user_id; ?>'><i class="fa fa-edit"></i>  Edit Profile</a></p>;
    </div>
    <div class="card-body card-block">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-12 col-lg-12 "> 
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>  <h3 class="panel-title"><?php echo $query->first_name . ' ' . $query->last_name ?></h3></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td> : <?php echo $query->role_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email / Login Id</td>
                                            <td> : <?php echo $query->email; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile/Phone</td>
                                            <td> : <?php echo $query->mobile; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td> : <?php echo $query->address; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
