
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Admins / <small>Edit Admin</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <form id="update_admin" enctype="multipart/form-data" method="post" action="">
            <?php
            $row = $this->common->editadmin($id);
            ?>
            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Admin Details</h3>
                </div>
                <div class="box-body clearfix">
                    <div class="clearfix">

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" class="form-control"  value="<?php echo $row->admin_name?>" id="exampleInputEmail1" required>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $row->email?>" id="exampleInputPassword1" required>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $row->pass?>" id="exampleInputPassword1" required>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="status">
                                <?php if($row->status): ?>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>

                                <?php else: ?>
                                    <option value="1">Active</option>
                                    <option value="0" selected>Inactive</option>

                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row->id?>" />
                    </div>

                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </div>
        </form>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

