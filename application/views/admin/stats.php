
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Site Statistics</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
                        <div class="col-md-3">
                            <!-- Success box -->
                            <div class="box box-solid bg-green" data-toggle="tooltip" title="Header tooltip">
                                <div class="box-header">
                                    <h3 class="box-title">Total Site Views</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers">22749</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
						
                        <div class="col-md-3">
                            <!-- Navy tile -->
                            <div class="box box-solid bg-navy">
                                <div class="box-header">
                                    <h3 class="box-title">Total Live Properties</h3>
                                </div>
                                <div class="box-body">
                                	<div class="stat-numbers"><?php echo $this->stat->gettotalliveprop() ?><a href="<?php echo base_url()?>index.php/admin/stats/reg_stat" class="all_prop"> More Details</a></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        
						<div class="col-md-3">
                            <!-- Info box -->
                            <div class="box box-solid bg-red">
                                <div class="box-header">
                                    <h3 class="box-title">Pending Properties</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalpendprop() ?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
						
                        <div class="col-md-3">
                            <!-- Warning box -->
                            <div class="box box-solid bg-yellow">
                                <div class="box-header">
                                    <h3 class="box-title">Total Sold Properties</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->totalsoldprop()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
						
                        <div class="col-md-3">
                            <!-- Purple tile -->
                            <div class="box box-solid bg-purple">
                                <div class="box-header">
                                    <h3 class="box-title">Avg. Property Sale Time</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers">9 days</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div class="col-md-3">
                            <!-- Danger box -->
                            <div class="box box-solid bg-teal">
                                <div class="box-header">
                                    <h3 class="box-title">Total Registered Users</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalusers()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
						
                        <div class="col-md-3">
                            <!-- Primary tile -->
                            <div class="box box-solid bg-light-blue">
                                <div class="box-header">
                                    <h3 class="box-title">Total Packages Sold</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalsoldpack()?><a href="#" class="all_packs"> More Details</a></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title">Total Cancelled Packages</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalcancelpack()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Views Per Property &nbsp; <a href="<?php echo base_url()?>index.php/admin/stats/prop_views" class="btn btn-primary btn-sm">View All</a></h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="tbl-statistics-all-off" class="table table-bordered table-striped">
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
							</table>
						</div><!-- /.box-body -->
					</div>

<!-- myModal2 -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">All Packages Statistics</h4>
            </div>
            <div class="modal-body">
                 <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title">Free Package User</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalfreepackuser()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title">Bronze Package User</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalbronzepackuser()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title">Silver Package User</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalsilverpackuser()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        
                        <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title">Gold Package User</h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->gettotalgoldpackuser()?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- / .myModal2 -->

<!-- myModal2 -->
 <div id="myModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Regions Statistics</h4>
                </div>
                <div class="modal-body">  
                <?php $areas = $this->stat->getallareas();
             foreach( $areas as $area){
            ?> 
                        <div class="col-md-3">
                            <!-- Maroon tile -->
                            <div class="box box-solid bg-maroon">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $area->area_name ?></h3>
                                </div>
                                <div class="box-body">
                                    <div class="stat-numbers"><?php echo $this->stat->areaviews($area->area_id)?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
              <?php } ?>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- / .myModal2 -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->