

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Manage Categories</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Manage Categories</h3>
						</div><!-- /.box-header -->
						<div class="box-body clearfix">
							<div class="col-md-6 clearfix">
								<h5>Current Categories</h5>
                                <?php foreach($query as $row) { ?>
								<div class="removeable"><span><?php echo $row->sub_prop_name?></span> <a href="<?php echo base_url()?>index.php/admin/categories/delete/<?php echo $row->sub_prop_id?>"><i class="fa fa-times"></i></a></div>
                                <?php } ?>
							</div>
							<div class="col-md-6">
								<h5>Add New Category</h5>
								<div class="input-group">
									<input type="text" class="form-control" name="category">
									<span class="input-group-btn">
                                        <button id="add_cat" type="button" class="btn btn-info btn-flat" type="submit" value="Add Category" >Add Category</button>
									</span>
                                    
								</div>
							</div>
						</div>
					</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
       

