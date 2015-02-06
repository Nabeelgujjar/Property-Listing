
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Users / <small>View All Users</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">View All Admins &nbsp; <a href="<?php echo base_url()?>index.php/admin/users/create_admin" class="btn btn-primary btn-sm">Create New Admin</a></h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="tbl-propertiesForSale" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>
                            <div class="checkbox">
                                <input type="checkbox"/>
                            </div>
                        </th>
                        <th>Admin ID</th>
                        <th>Full Name</th>
                        <th>Registered On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach($query as $row) {
                        if($row->status == 1)
                        {
                            $status = "Active";
                            $action = "<a href='http://uzairusman.com/hp/index.php/admin/admins/deactadmin/$row->id'><i class='fa fa-ban'></i> Deactivate</a>";
                        }
                        else
                        {
                            $status = "Inactive";
                            $action = "<a href='http://uzairusman.com/hp/index.php/admin/admins/actadmin/$row->id'><i class='fa fa-green fa-check'></i> Activate</a>";

                        }
                        ?>
                        <tr>
                            <td valign="middle">
                                <div class="checkbox">
                                    <input type="checkbox"/>
                                </div>
                            </td>
                            <td valign="middle"><a href=""><?php echo $row->id?></a></td>
                            <td valign="middle"><a href="#"><?php echo $row->admin_name?></a></td>
                            <td valign="middle"><?php echo $row->added_date?></td>
                            <td valign="middle"><?php echo $status?></td>
                            <td valign="middle"><a href="<?php echo base_url()?>index.php/admin/admins/edit_admin/<?php echo $row->id?>"><i class="fa fa-yellow fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url()?>index.php/admin/admins/delete/<?php echo $row->id?>"><i class="fa fa-times"></i> Delete</a>&nbsp;&nbsp;&nbsp; <?php echo $action?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>
                            <div class="checkbox">
                                <input type="checkbox"/>
                            </div>
                        </th>
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Registered On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

