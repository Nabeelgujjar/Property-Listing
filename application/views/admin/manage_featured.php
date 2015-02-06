<?php $featured=$this->common->featured(); ?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Properties / <small>Manage Featured Listing Options</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <form enctype="multipart/form-data" method="post" action="">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Manage Featured Listing Options</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="form-group clearfix">
                        <label class="col-md-3 text-right" for="exampleInputEmail1">Price (in GBP &pound;):</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" value="<?php echo $featured->price; ?>" name="price" placeholder="" maxlength="2">
                            <?php echo form_error('price'); ?>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-3 text-right" for="exampleInputEmail1">Validity Period:</label>
                        <div class="col-md-2">
                            <select class="form-control" name="validity_period" required>
                                <?php
                                if($featured->validity_period == 1) {
                                    $fivedays="selected='selected'";
                                    $tendays="";
                                    $twentydays="";
                                    $thirtydays="";
                                } else if($featured->validity_period == 2) {
                                    $fivedays="";
                                    $tendays="selected='selected'";
                                    $twentydays="";
                                    $thirtydays="";
                                } else if($featured->validity_period == 3) {
                                    $fivedays="";
                                    $tendays="";
                                    $twentydays="selected='selected'";
                                    $thirtydays="";
                                } else {
                                    $fivedays="";
                                    $tendays="";
                                    $twentydays="";
                                    $thirtydays="selected='selected'";
                                }
                                ?>
                                <option value="1" <?php echo $fivedays; ?>>5 Days</option>
                                <option value="2" <?php echo $tendays; ?>>10 Days</option>
                                <option value="3" <?php echo $twentydays; ?>>20 Days</option>
                                <option value="4" <?php echo $thirtydays; ?>>30 Days</option>
                            </select>
                            <?php echo form_error('validity_period'); ?>
                        </div>
                    </div>

                    <div class="col-md-3"></div>
                    <div class="col-md-9"><input  id="save_feature" type="button" class="btn btn-primary"  value="Save"></div>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>
        </form>

    </section><!-- /.content -->
</aside><!-- /.right-side -->