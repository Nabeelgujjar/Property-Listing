
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Users / <small>Edit User</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <form id="update_user" enctype="multipart/form-data" method="post" action="">
                    <?php
					$row = $this->common->edituser($id);
					?>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">User Details</h3>
							</div>
							<div class="box-body clearfix">
								<div class="clearfix">

									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Full Name</label>
										<input type="text" name="name" class="form-control"  value="<?php echo $row->user_name?>" id="exampleInputEmail1" required>
                                        
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputPassword1">Email Address</label>
										<input type="text" name="email" class="form-control" value="<?php echo $row->email?>" id="exampleInputPassword1" required>
                                        
									</div>
                                    <div class="form-group col-md-6">
										<label for="exampleInputPassword1">Password</label>
										<input type="password" name="password" class="form-control" value="<?php echo $row->password?>" id="exampleInputPassword1" required>
                                        
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputPassword1">Phone Number</label>
										<input type="text" name="phone" class="form-control" id="exampleInputPassword1" value="<?php echo $row->phone_no?>" required>
                                        
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">City</label>
										<select name="area" class="form-control">
                                        <?php
									$getarea = $this->common->area();
									foreach ($getarea as $area) {
									if($area->area_id == $row->city_id)
									{
										$selected = "selected";
										}
									else
									{
										$selected = "";
										}
									?>
										<option value="<?php echo $area->area_id?>" <?php echo $selected?>><?php echo $area->area_name?></option>
										<?php } ?>
										</select>
                                        
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
                                    <input type="hidden" name="id" value="<?php echo $row->user_id?>" />
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

