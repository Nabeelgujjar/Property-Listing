
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Users / <small>Create New Users</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <form id="add-new-user" enctype="multipart/form-data" method="post" action="" autocomplete="off">
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Create New User</h3>
							</div>
							<div class="box-body clearfix">
								<div class="clearfix">
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Full Name</label>
										<input type="text" name="name" autocomplete="off" value="" class="form-control" id="exampleInputEmail1" required>
                                        <?php echo form_error('name'); ?>
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Email Address</label>
										<input type="text" name="email" autocomplete="off" class="form-control" id="exampleInputPassword1" required>
                                        <?php echo form_error('email'); ?>
									</div>
                                    <div class="form-group col-md-6">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" name="password"  autocomplete="off" value="" class="form-control" id="exampleInputPassword1" required>
                                        <?php echo form_error('password'); ?>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputPassword1">Phone Number</label>
										<input type="text" name="phone" class="form-control" id="exampleInputPassword1" required>
                                        <?php echo form_error('phone'); ?>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">City</label>
										<select name="area" class="form-control">
                                        <?php
										$getareas = $this->common->area();
										foreach ($getareas as $areas) {
										?>
											<option value="<?php echo $areas->area_id?>"> <?php echo $areas->area_name?></option>
											<?php } ?>
										</select>
                                        <?php echo form_error('area'); ?>
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
									<input id="create_user" type="submit" class="btn btn-primary" value="Create User">
								</div>
							</div>
						</div>
					</form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

