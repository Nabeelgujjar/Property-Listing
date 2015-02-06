<?php
$getsalesboard=$this->common->getsalesboard();
?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Sales / <small>Saleboard Settings</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <form  method="post" enctype="multipart/form-data">
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Saleboard Settings</h3>
							</div>
							<div class="box-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Saleboard Title</label>
									<input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo $getsalesboard->title; ?>" required>
                                    <?php echo form_error('title'); ?>
								</div>
                                <div class="form-group">
									<label for="exampleInputEmail1">Saleboard Price</label>
									<input type="text" name="price" class="form-control" id="exampleInputEmail1" value="<?php echo $getsalesboard->price; ?>" required>
                                    <?php echo form_error('price'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Saleboard Description</label>
									<textarea name="description" class="form-control" id="" required><?php echo $getsalesboard->description; ?></textarea>
                                    <?php echo form_error('description'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Saleboard Picture</label>
									<input type="file" id="exampleInputFile" name="saleboardimage">
                                    <input type="hidden" name="prev_image" id="prev_image" value="<?php echo $getsalesboard->img; ?>" />
                                    <img src="<?php echo base_url()."public/uploads/saleboardimages/".$getsalesboard->img; ?>" width="75" />
									<p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                                    <div class="error"><?php if(isset($error) && $error != "") echo $error; ?></div>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Save" class="btn btn-primary">
								</div>
							</div>
							
						</div>
					</form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->