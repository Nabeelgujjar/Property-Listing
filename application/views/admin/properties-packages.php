
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Packages</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="box">
						<div class="box-header">
							<h3 class="box-title">Packages &nbsp; <a href="<?php echo base_url(); ?>index.php/admin/package/manage_packages" class="btn btn-primary btn-sm">Edit Packages</a></h3>
						</div><!-- /.box-header -->
						<div class="box-body clearfix">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?php echo base_url()?>index.php/admin/package/frame"></iframe>
							</div>
						</div>
					</div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

