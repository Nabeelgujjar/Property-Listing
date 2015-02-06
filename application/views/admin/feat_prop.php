

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Featured Properties</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Featured Properties &nbsp; <a href="<?php echo base_url()?>index.php/admin/property/add_property" class="btn btn-primary btn-sm">Post New Property</a> <a href="#" class="btn btn-danger btn-sm">Delete Selected</a></h3>
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
										<th></th>
										<th>ID and Title</th>
										<th>Ad Poster</th>
										<th>Date</th>
										<th>Category</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                <?php foreach($query as $row) {
								$subprop=$this->common->getsubpropbyid($row->sub_prop_id);
								if($row->i_want_to == 1)
								{
									$type = "For Rent";
									$price = $row->price."<sup>/month";
									}
									else{
										$type = "For Sale";
										$price = $row->price;
										}
								if($row->visible == 1)
								{
									
									$action = "<a href='blockprop/$row->prop_id'><i class='fa fa-ban'></i> Block</a>";
								}
								else
								{
									
									$action = "<a href='allowprop/$row->prop_id'><i class='fa fa-green fa-check'></i> Allow</a>";
									
									}	
								
								?>
									<tr>
										<td valign="middle">
											<div class="checkbox">
												<input type="checkbox"/>
											</div>
										</td>
										<td valign="middle"><a href="#"><img src="<?php if($row->prop_img != "") { echo base_url()."public/uploads/propimg/".$row->prop_img; } else { echo base_url()."uploads/no-image.jpg"; }?>" width="70" border="0" alt="<?php echo $row->bedrooms?> bedroom <?php echo $subprop->sub_prop_name?> for <?php echo $type; ?>" class="img-responsive"></a></td>
										<td valign="middle">
											<a href="#">Property Unique ID Here</a><br />
											<span><?php echo $row->bedrooms?> bedroom <?php echo $subprop->sub_prop_name?> for <?php echo $type?></span>
										</td>
                                        <?php
										if($row->user_id == 0)
										{
											$poster = "admin";
										}
										else
										{
										 	$row2 = $this->common->userdetails($row->user_id);
                                            $poster = $row2->name;
                                        }
										?>
										<td valign="middle"><a href="#"><?php echo $poster; ?></a></td>
										<td valign="middle"><?php echo $row->post_date?></td>
										<td valign="middle"><?php echo $subprop->sub_prop_name?></td>
									
										<td valign="middle"><a href="#"><i class="fa fa-yellow fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url()?>index.php/admin/property/delete/<?php echo $row->prop_id?>"><i class="fa fa-times"></i> Delete</a>&nbsp;&nbsp;&nbsp; <?php echo $action?></td>
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
										<th></th>
										<th>ID and Title</th>
										<th>Ad Poster</th>
										<th>Date</th>
										<th>Category</th>
										<th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
