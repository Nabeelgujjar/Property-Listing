 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Sales / <small>Cancelled Orders</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Cancelled Orders</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="tbl-Salecancel" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>
											<div class="checkbox">
												<input type="checkbox"/>
											</div>
										</th>
										<th>Order ID</th>
										<th>Cancel Date</th>
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
										<td valign="middle"><a href="#"><?php echo $row->id?></a></td>
										<td valign="middle"><?php echo $row->cancel_time?></td>
										<td valign="middle"><a href="#"><?php echo $this->common->userdetails($row->user_id)->name ?></a></td>
										<td valign="middle"><?php echo $this->common->get_pack($row->package_id)->package_name ?></td>
										<td valign="middle"><a href="#" class="view_rea"><i class="fa fa-yellow fa-file-text-o"></i> View Reason</a></td>
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
                    <!-- Modal -->
                    <div class="modal fade" id="viewreason" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close"
                                            data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        This Modal title
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    Add some text here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->