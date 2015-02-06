<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Properties / <small>Post New Property</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <form  enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/admin/property/upload_pro">

            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Property Type</h3>
                </div>
                <div class="box-body">
                    <input type="hidden" name="user_id"  value="3"  />
                    <div class="form-group col-md-4">
                        <label for="exampleInputPassword1">Publish : &nbsp; </label>
                        <input type="radio" name="type"  value="1" required /> For Rent
                        <input type="radio" name="type"  value="2"  /> For Sale
                        <?php echo form_error('type'); ?>
                    </div>
                </div>
            </div>
            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Property Location</h3>
                </div>
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
                        <input type="text" name="postal_code" class="form-control" id="exampleInputEmail1" required ">
                        <?php echo form_error('postal_code'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputPassword1">Property/Plot Number</label>
                        <input type="text" name="plot_no" class="form-control" id="exampleInputPassword1" required>
                        <?php echo form_error('plot_no'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword1" required>
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
                </div>
                <div class="box-body">
                    <h5>Primary Features</h5>
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
                            <label for="exampleInputEmail1">Area(in Sqft)</label>
                            <input type="text" name="plot_area" class="form-control" id="exampleInputPassword1" placeholder="only numbers" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Bedrooms</label>
                            <select class="form-control" name="bedrooms">
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
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
                    </div>
                    <h5>Amenities</h5>
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
            </div>
            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Property Details &amp; Documents</h3>
                </div>
                <div class="box-body clearfix">
                    <div class="col-md-7">
                        <h5>Property Description</h5>
                        <div class='box-body pad'>
                            <textarea class="textarea" name="prop_desc" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-5 upload-floor upload">
                        <h5>Upload Floorplan</h5>
                        <div class="form-group">
                            <input type="file" id="exampleInputFile" name="upload_floor">
                            <p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                        </div>
                        <h5>Upload EPC</h5>
                        <div class="form-group">
                            <input type="file" id="exampleInputFile" name="upload_epc">
                            <p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-primary clearfix">
                <div class="box-header">
                    <h3 class="box-title">Upload Pictures</h3>
                </div>
                <div class="form-group fileUpload-container">

                    <ul class="warningBullets">
                        <li>Maximum file size should not be more than 500KB.</li>
                        <li>Another restriction may go here.</li>
                    </ul>
                    <input  class="file" type="file" name="prop_img[]" multiple>

                </div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<!-- add new calendar event modal -->
