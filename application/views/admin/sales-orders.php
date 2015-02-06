
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Sales / <small>Orders</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Orders</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="tbl-Saleorder" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>
											<div class="checkbox">
												<input type="checkbox"/>
											</div>
										</th>
										<th>Order ID</th>
										<th>Purchase Date</th>
										<th>Billing Name</th>
										<th>Item</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                <?php foreach($query as $row) {	?>
									<tr>
										<td valign="middle">
											<div class="checkbox">
												<input type="checkbox"/>
											</div>
										</td>
										<td valign="middle"><a href=""><?php echo $row->sold_id?></a></td>
										<td valign="middle"><?php echo $row->start_date?></td>
										<td valign="middle"><a href="#"><?php echo $this->common->userdetails($row->user_id)->user_name ?></a></td>
										<td valign="middle"><?php echo $this->common->get_pack($row->package_id)->package_name ?></td>
										<td valign="middle"><a href=""><i class="fa fa-yellow fa-file-text-o"></i> View Invoice</a>&nbsp;&nbsp;&nbsp; <a href="#"><i class="fa fa-ban"></i> Cancel Order</a></td>
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
										<th>Order ID</th>
										<th>Purchase Date</th>
										<th>Billing Name</th>
										<th>Item</th>
										<th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

