

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Post New Property</small></h1>
                  
                </section><br/><br/>

                <!-- Main content -->
                <section class="content">

                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/admin/property/add_property">
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Property Location</h3>
							</div><br/><br/>
							<div class="box-body">
								<div class="form-group col-md-4">
									<label for="exampleInputEmail1">Select City</label>									
									<select class="form-control" name="area">
                                    <?php $getareas = $this->dbcommon->area();
									foreach($getareas as $area) {
									?>
										<option value="<?php echo $area->area_id?>"><?php echo $area->area_name?></option>
									<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label for="exampleInputEmail1">Postal Code</label>
									<input type="text" name="postal_code" class="form-control" id="exampleInputEmail1">
                                    <?php echo form_error('postal_code'); ?>
								</div>
								<div class="form-group col-md-2">
									<label for="exampleInputPassword1">Property/Plot Number</label>
									<input type="text" name="plot_no" class="form-control" id="exampleInputPassword1">
                                    <?php echo form_error('plot_no'); ?>
								</div>
								<div class="form-group col-md-2">
									<label for="exampleInputPassword1">Address</label>
									<input type="text" name="address" class="form-control" id="exampleInputPassword1">
                                    <?php echo form_error('address'); ?>
								</div>
								<div class="form-group col-md-2">
									<label for="exampleInputEmail1">Country</label>
									<select class="form-control" disabled>
										<option>United Kingdom</option>
									</select>
								</div>
							</div>
						</div>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Property Features</h3>
							</div><br/><br/>
							<div class="box-body">
								<h5>Primary Features</h5><br/>
								<div class="clearfix">
                                <div class="form-group col-md-4">
									<label for="exampleInputEmail1">Select Property Type</label>									
									<select class="form-control" name="sub_prop">
                                    <?php $getsubprop = $this->dbcommon->subprop();
									foreach($getsubprop as $subprop) {
									?>
										<option value="<?php echo $subprop->sub_prop_id?>"><?php echo $subprop->sub_prop_name?></option>
									<?php } ?>
									</select>
								</div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Area</label>
                                    <input type="text" name="plot_area" class="form-control" id="exampleInputPassword1">
                                    <?php echo form_error('plot_area'); ?>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Bedrooms</label>
                                    <select class="form-control" name="bedrooms">
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div style="clear: both;"></div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Bathrooms</label>
                                    <select class="form-control" name="bathrooms">
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Reception</label>
                                    <select class="form-control" name="reception">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
									<label for="exampleInputPassword1">Price</label>
									<input type="text" name="price" class="form-control" id="exampleInputPassword1">
                                    <?php echo form_error('price'); ?>
								</div>
                                <div style="clear: both;"></div>
                                <div class="form-group col-md-4">
									<label for="exampleInputPassword1">Select Contract Type</label>
									<input type="radio" name="type"  value="1"  /> For Rent
                                    <input type="radio" name="type"  value="2"  /> For Sale
                                    <?php echo form_error('type'); ?>
								</div>
								</div><br/>
								<h5>Amenities</h5><br/>
								<div class="checkbox clearfix">
                                <?php  $getamenities = $this->dbcommon->getallamenities();
								foreach($getamenities as $ame) {
								?>
									<label class="col-md-3" style="margin-bottom: 10px;">
										<input type="checkbox" name="amenity[]" value="<?php echo $ame->amenity_id?>"/> <span class="checkbox-text"><?php echo $ame->amenity_name?></span>
									</label>
                                    <?php } ?>
									</div>
							</div>
						</div><br/><br/>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Property Details &amp; Documents</h3>
							</div><br/>
							<div class="box-body clearfix">
								<div class="col-md-7">
									<h5>Property Description</h5>
									<div class='box-body pad'>
										<textarea class="textarea" placeholder="Place some text here" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                	</div>
                                    <?php echo form_error('description'); ?>
								</div>
								<div class="col-md-5">
									<h5>Upload Floorplan</h5>
									<div class="form-group">
										<input type="file" id="exampleInputFile" name="floorplan">
										<p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                                     <div class="error"><?php if(isset($error) && $error != "") echo $error; ?></div>   
									</div>
									<h5>Upload EPC</h5>
									<div class="form-group">
										<input type="file" name="epc" id="exampleInputFile">
										<p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                                        <div class="error"><?php if(isset($error2) && $error2 != "") echo $error2; ?></div>
									</div>
								</div>
							</div>
						</div><br/><br/>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Upload Pictures</h3>
							</div><br/>
							<div class="form-group fileUpload-container">
								<label for="exampleInputEmail1">Select Package</label>
									<select class="form-control" name="package">
										<?php
									$query2 = $this->common->getpacks();
									foreach($query2 as $query2) {

									?>
										<option value="<?php echo $query2->package_id?>"><?php echo $query2->package_name?> - &pound;<?php echo $query2->price?> for <?php echo $query2->validity?> days (<?php echo $query2->photos?> Photos)</option>
                                        <?php } ?>
<br/>
									</select><br/>
									<strong><a href="<?php echo base_url()?>post_property/view_packages" data-toggle="modal">&raquo; View complete features of all packages</a></strong>
    
									<!-- Modal HTML -->
									<div id="pricePackage" class="modal fade" style="width: 80%; margin: 0 auto; overflow-y: hidden; height: 93%;">
										<div class="modal-dialog" style="width: 100%; height: 94%;">
											<div class="modal-content" style="height: 100%; overflow-y: hidden;">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title">Property Listing Packages</h4>
												</div>
												<div class="modal-body">
													<div class="embed-responsive embed-responsive-16by9">
														<iframe class="embed-responsive-item" src="iframe-packages.php"></iframe>
													</div>
												</div>
											</div>
										</div>
									</div><br/><br/>
                                    <ul class="warningBullets">
									<li>Maximum file size should not be more than 500KB.</li>
									<li>Another restriction may go here.</li>
								</ul>
								<input id="" name="propimg" type="file" multiple=true data-preview-file-type="any" data-upload-url="#"/>
                                <div class="error"><?php if(isset($error3) && $error3 != "") echo $error3; ?></div>
							</div>
						</div>
                                         <input type="submit" class="btn btn-lg btn-primary" id="submit-btn" value="Submit">
					</form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><br/><!-- ./wrapper -->