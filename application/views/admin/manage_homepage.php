            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Pages / <small>Home Page</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>                <!-- Main content -->
                <section class="content">
                    <form id="home_page_edit" method="post" >
                        <?php $pagedetails = $this->dbcommon->homepagedetails();
                        //print_r($pagedetails);

                        ?>
                        <div class="box box-primary clearfix">
                            <div class="box-header">
                                <h3 class="box-title">Edit Home Page</h3>
                            </div>
                            <div class="box-body">
                                <h5>Home Page Search Box</h5>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Heading</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo $pagedetails->title?>">
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Heading</label>
                                    <input type="text" name="subtitle" class="form-control" id="exampleInputEmail1" value="<?php echo $pagedetails->sub_title?>">
                                    <?php echo form_error('subtitle'); ?>
                                </div>
                                <div class="box box-solid clearfix">
                                    <div class="box-header">
                                        <i class="fa fa-file-picture-o"></i>
                                        <h3 class="box-title">Home Page Banners</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-6">
                                            <h5>Banner 1</h5>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Banner Title</label>
                                                <input type="text" name="banner" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->ban?>">
                                                <?php echo form_error('banner'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Banner Point 1</label>
                                                <textarea name="desc1" class="form-control" id=""><?php echo $pagedetails->ban_desc1?></textarea>
                                                <?php echo form_error('desc1'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Banner Point 2</label>
                                                <textarea name="desc2" class="form-control" id=""><?php echo $pagedetails->ban_desc2?></textarea>
                                                <?php echo form_error('desc2'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Banner Point 3</label>
                                                <textarea name="desc3" class="form-control" id=""><?php echo $pagedetails->ban_desc3?></textarea>
                                                <?php echo form_error('desc3'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>Banner 2</h5>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Banner Title</label>
                                                <input type="text" name="ban2_title" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->ban2_title?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Banner Text</label>
                                                <input type="text" name="ban2_text" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->ban2_text?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-solid clearfix">
                                    <div class="box-header">
                                        <i class="fa fa-file-picture-o"></i>
                                        <h3 class="box-title">Home Page Blurbs</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-sm-6">
                                            <h5>Blurb 1</h5>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="col1" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->col1?>">
                                                <?php echo form_error('col1'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="des1" class="form-control" id=""><?php echo $pagedetails->col_des1?></textarea>
                                                <?php echo form_error('des1'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>Blurb 2</h5>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="col2" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->col2?>">
                                                <?php echo form_error('col2'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="des2" class="form-control" id=""><?php echo $pagedetails->col_des2?></textarea>
                                                <?php echo form_error('des2'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>Blurb 3</h5>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="col3" class="form-control" id="exampleInputPassword1" value="<?php echo $pagedetails->col3?>">
                                                <?php echo form_error('col3'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="des3" class="form-control" id=""><?php echo $pagedetails->col_des3?></textarea>
                                                <?php echo form_error('des3'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-solid clearfix">
                                    <div class="box-header">
                                        <h3 class="box-title">Meta Data</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" id="exampleInputEmail1" value="<?php echo $pagedetails->meta_title; ?>">
                                            <?php echo form_error('meta_title'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" class="form-control" id="exampleInputEmail1" value="<?php echo $pagedetails->meta_keyword; ?>">
                                            <?php echo form_error('meta_keywords'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta Description</label>
                                            <input type="text" name="descp" class="form-control" id="exampleInputEmail1" value="<?php echo $pagedetails->meta_desc?>">
                                            <?php echo form_error('meta_desc'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Save Page" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->        <!-- add new calendar event modal -->