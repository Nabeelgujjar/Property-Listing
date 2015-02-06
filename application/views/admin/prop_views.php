

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Properties For Sale</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box">
						<div class="box-header">
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="tbl-propertiesForSale" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Property ID &amp; Title</th>
										<th>Total Views</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach($query as $row) {
                                    if($row->i_want_to == 1)
								{
									$type = "For Rent";
									
									}
									else{
										$type = "For Sale";
										}
								?>
									<tr>
										<td >
                                            <a href="#"><?php echo $row->prop_uni_id?></a><br>
											<span><?php echo $row->bedrooms?> bedroom <?php echo $this->common->getsubpropbyid($row->sub_prop_id)->sub_prop_name?> for <?php echo $type?> in <?php echo $this->common->getareabyid($row->area_id)->area_name?> </span>
										</td>
										
										<td><?php echo $row->viewed?></td>
                                        </tr>
                                    <?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Property ID &amp; Title</th>
										<th>Total Views</th>
									</tr>
								</tfoot>
							</table>
						</div><!-- /.box-body -->
					</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
