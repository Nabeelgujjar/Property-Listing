
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Users / <small>Create New Users</small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <form id="add-new-admin" enctype="multipart/form-data" method="post" action="">
            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Create New Admin</h3>
                </div>
                <div class="box-body clearfix">
                    <div class="clearfix">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="text" name="email" class="form-control" id="exampleInputPassword1" required>
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            <?php echo form_error('password'); ?>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <?php echo form_error('status'); ?>
                        </div>

                    </div>

                    <div class="form-group col-md-2">
                        <input id="create_admin" type="submit" class="btn btn-primary" value="Create Admin">
                    </div>
                </div>
            </div>
        </form>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

