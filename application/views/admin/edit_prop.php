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
<?php if(isset($success1) && $success1 != "") {
    echo "<div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
        <strong>Success !</strong> The property added successfully !!!!.
    </div>";
}
?>

<?php if(isset($error3) && $error3 != ""){
    echo "<div class='alert alert-error'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
        <strong>Error!</strong> There was a problem please try again !!!!
    </div>";
}
?>
<?php
$row = $this->common->propertydetails($id);
//print_r($row);
?>
<form  enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/admin/property/upload_pro">

    <div class="box box-primary clearfix">
        <div class="box-header">
            <h3 class="box-title">Property Type</h3>
        </div>
        <div class="box-body">
            <input type="hidden" name="user_id"  value="<?php echo $id?>"  />
            <div class="form-group col-md-4">
                <label for="exampleInputPassword1">Publish : &nbsp; </label>
                <input type="radio" name="type" <?php if($row->i_want_to == 1) { $checked = "checked"; } else { $checked = ""; }?> <?php echo $checked?>  value="1"  /> For Rent
                <input type="radio" name="type" <?php if($row->i_want_to == 2) { $checked = "checked"; } else { $checked = ""; }?> <?php echo $checked?>  value="2"  /> For Sale
                <?php echo form_error('type'); ?>
            </div>
        </div>
    </div>
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
                        if($area->area_id == $row->area_id)
                        {
                            $selected = "selected";
                        }
                        else
                        {
                            $selected = "";
                        }
                        ?>
                        <option value="<?php echo $area->area_id?>" <?php echo $selected?>><?php echo $area->area_name?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="exampleInputEmail1">Postal Code</label>
                <input type="text" value="<?php echo $row->postal_code?>" name="postal_code" class="form-control" id="exampleInputEmail1">
            </div>
            <?php echo form_error('postal_code'); ?>
            <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Property/Plot Number</label>
                <input type="text" name="plot_no" value="<?php echo $row->plot_no?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php echo form_error('plot_no'); ?>
            <div class="form-group col-md-2">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" name="address" value="<?php echo $row->address?>" class="form-control" id="exampleInputPassword1">
            </div>
            <?php echo form_error('address'); ?>
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
            <h5>Primary Features</h5><br/>
            <div class="clearfix">
                <div class="form-group col-md-4">
                    <label for="exampleInputEmail1">Select Property Type</label>
                    <select class="form-control" name="sub_prop">
                        <?php $getsubprop = $this->dbcommon->subprop();
                        foreach($getsubprop as $subprop) {
                            if($subprop->sub_prop_id == $row->sub_prop_id)
                            {
                                $selected = "selected";
                            }
                            else
                            {
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $subprop->sub_prop_id?>" <?php echo $selected?>><?php echo $subprop->sub_prop_name?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Area</label>
                    <input type="text" name="plot_area" value="<?php echo $row->plot_area?>" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Bedrooms</label>
                    <select class="form-control" name="bedrooms">
                        <option value="3" <?php if($row->bedrooms== 3) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>3</option>
                        <option value="4" <?php if($row->bedrooms== 4) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>4</option>
                        <option value="5" <?php if($row->bedrooms== 5) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>5</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Bathrooms</label>
                    <select class="form-control" name="bathrooms">
                        <option value="3" <?php if($row->bathrooms== 3) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>3</option>
                        <option value="4" <?php if($row->bathrooms== 4) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>4</option>
                        <option value="5" <?php if($row->bathrooms== 5) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>5</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Reception</label>
                    <select class="form-control" name="reception">
                        <option value="1" <?php if($row->reception == 1) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>1</option>
                        <option value="2" <?php if($row->reception == 2) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>2</option>
                        <option value="3" <?php if($row->reception == 3) { $selected = "selected"; } else { $selected = ""; }?> <?php echo $selected?>>3</option>
                    </select>
                </div>
            </div>
            <h5>Amenities</h5><br/>
            <div class="checkbox clearfix">
                <?php  $getamenities = $this->dbcommon->getallamenities();
                foreach($getamenities as $ame) {
                    $checkame=$this->dbcommon->getpropamenity($ame->amenity_id, $id);
                    if($checkame)
                    {
                        $checked = "checked";
                    }
                    else
                    {
                        $checked = "";
                    }
                    ?>
                    <label class="col-md-2">
                        <input type="checkbox" name="amenity[]" <?php echo $checked?> value="<?php echo $ame->amenity_id?>"/> <span class="checkbox-text"><?php echo $ame->amenity_name?></span>
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
                    <textarea class="textarea" name="prop_desc" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required><?php echo $row->description?></textarea>
                </div>
            </div>
            <div class="col-md-5 upload-floor upload">
                <h5>Upload Floorplan</h5>
                <div class="form-group">
                    <input type="file" id="exampleInputFile" name="upload_floor">
                    <img src="<?php echo base_url()."public/uploads/floorplan/".$row->floorplan; ?>" width="75" />
                    <p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                    <div class="error"><?php if(isset($error1) && $error1 != "") echo $error1; ?></div>
                </div>
                <h5>Upload EPC</h5>
                <div class="form-group">
                    <input type="file" id="exampleInputFile" name="upload_epc">
                    <img src="<?php echo base_url()."public/uploads/epc/".$row->epc; ?>" width="75" />
                    <p class="help-block">Allowed file types: .jpg .jpeg .gif .png .bmp</p>
                    <div class="error"><?php if(isset($error2) && $error2 != "") echo $error2; ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-primary clearfix">
        <div class="box-header">
                  <?php if(strlen($row->prop_img) > 0):
                  $images =  explode(',',$row->prop_img);
                      ?>
                      <br/><br/>
            <div class="container scroll-x scroll-y">
                <ul class="row">
                  <?php
                  foreach($images as $i):
                  ?>
                    <li class="thumb pull-left"><img name="<?php echo $i ?>" src="<?php echo base_url()?>public/uploads/propimg/<?php echo $i ?>" class="image-responsive col-md-12">
                        <i></i></li>
                    <?php endforeach;?>
                </ul>
            </div>
           <?php endif;?>
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
