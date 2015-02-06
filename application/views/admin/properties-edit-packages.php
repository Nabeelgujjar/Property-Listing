

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / Manage Packages / <small>Edit Packages</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <form  id="save_fp" method="post" action="">
                    <?php
					$row = $this->common->freepack(); 
					?>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Edit Free Package</h3>
							</div>
							<div class="box-body clearfix">
								<div class="clearfix">
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Package Name</label>
										<input type="text" class="form-control" name="name" id="" value="<?php echo $row->package_name?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputPassword1">Price (in GBP &pound;)</label>
										<input type="text" class="form-control" name="price" id="" value="<?php echo $row->price?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Validity Period</label>
										<select class="form-control" name="validity" required>
											<option value="5" <?php if($row->validity == 5) { echo $selected = "selected"; }?> >5 Days</option>
											<option value="10" <?php if($row->validity == 10) { echo $selected = "selected"; }?>>10 Days</option>
											<option value="20" <?php if($row->validity == 20) { echo $selected = "selected"; }?>>20 Days</option>
											<option value="30" <?php if($row->validity == 30) { echo $selected = "selected"; }?>>30 Days</option>
											<option value="60" <?php if($row->validity == 60) { echo $selected = "selected"; }?>>60 Days</option>
											<option value="90" <?php if($row->validity == 90) { echo $selected = "selected"; }?>>90 Days</option>
											<option value="180" <?php if($row->validity == 180) { echo $selected = "selected"; }?>>180 Days</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Published Within</label>
										<select class="form-control" name="published" required>
											<option value="1" <?php if($row->pub_within == 1) { echo $selected = "selected"; }?>>1 Hour</option>
											<option value="8" <?php if($row->pub_within == 8) { echo $selected = "selected"; }?>>8 Hours</option>
											<option value="24" <?php if($row->pub_within == 24) { echo $selected = "selected"; }?>>24 Hours</option>
											<option value="48" <?php if($row->pub_within == 48) { echo $selected = "selected"; }?>>48 Hours</option>
											<option value="72" <?php if($row->pub_within == 72) { echo $selected = "selected"; }?>>72 Hours</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Number of Photos</label>
										<select class="form-control" name="photos" required>
											<option value="5" <?php if($row->photos == 5) { echo $selected = "selected"; }?>>5</option>
											<option value="20" <?php if($row->photos == 20) { echo $selected = "selected"; }?>>20</option>
											<option value="30" <?php if($row->photos == 30) { echo $selected = "selected"; }?>>30</option>
											<option value="50" <?php if($row->photos == 50) { echo $selected = "selected"; }?>>50</option>
										</select>
									</div>
								</div>
								<h5>Package Options</h5>
								<div class="checkbox clearfix">
                                <?php
								
								$query = $this->common->getpackopt();
								foreach ($query as $row2) { 
								$checkopt=$this->common->getoption($row2->option_id, "1");
							if($checkopt) {
								$class = "checked";
							}
							else
							{
								$class = "";
							}
							?>
							
									<label class="col-md-2">
										<input type="checkbox" value="<?php echo $row2->option_id?>" <?php echo $class?>  name="option[]"  /> <span class="checkbox-text"><?php echo $row2->option_name?></span>
									</label>
                                    <?php } ?>
									</div>
								
								<div class="form-group col-md-2">
									<input id="save_free_pack" type="submit" class="btn btn-primary" value="Save Package">
								</div>
							</div>
						</div>
                        </form>
                        <form  id="save_bp" method="post" action="">
                        <?php
						$row3 = $this->common->bronzepack();
						?>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Edit Bronze Package</h3>
							</div>
							<div class="box-body clearfix">
								<div class="clearfix">
									<div class="form-group col-md-4">
											<label for="exampleInputEmail1">Package Name</label>
										<input type="text" class="form-control" name="name" id="" value="<?php echo $row3->package_name?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputPassword1">Price (in GBP &pound;)</label>
										<input type="text" class="form-control" name="price" id="" value="<?php echo $row3->price?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Validity Period</label>
										<select class="form-control" name="validity">
											<option value="5" <?php if($row3->validity == 5) { echo $selected = "selected"; }?> >5 Days</option>
											<option value="10" <?php if($row3->validity == 10) { echo $selected = "selected"; }?>>10 Days</option>
											<option value="20" <?php if($row3->validity == 20) { echo $selected = "selected"; }?>>20 Days</option>
											<option value="30" <?php if($row3->validity == 30) { echo $selected = "selected"; }?>>30 Days</option>
											<option value="60" <?php if($row3->validity == 60) { echo $selected = "selected"; }?>>60 Days</option>
											<option value="90" <?php if($row3->validity == 90) { echo $selected = "selected"; }?>>90 Days</option>
											<option value="180" <?php if($row3->validity == 180) { echo $selected = "selected"; }?>>180 Days</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Published Within</label>
										<select class="form-control" name="published">
											<option value="1" <?php if($row3->pub_within == 1) { echo $selected = "selected"; }?>>1 Hour</option>
											<option value="8" <?php if($row3->pub_within == 8) { echo $selected = "selected"; }?>>8 Hours</option>
											<option value="24" <?php if($row3->pub_within == 24) { echo $selected = "selected"; }?>>24 Hours</option>
											<option value="48" <?php if($row3->pub_within == 48) { echo $selected = "selected"; }?>>48 Hours</option>
											<option value="72" <?php if($row3->pub_within == 72) { echo $selected = "selected"; }?>>72 Hours</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Number of Photos</label>
										<select class="form-control" name="photos">
											<option value="5" <?php if($row3->photos == 5) { echo $selected = "selected"; }?>>5</option>
											<option value="20" <?php if($row3->photos == 20) { echo $selected = "selected"; }?>>20</option>
											<option value="30" <?php if($row3->photos == 30) { echo $selected = "selected"; }?>>30</option>
											<option value="50" <?php if($row3->photos == 50) { echo $selected = "selected"; }?>>50</option>
										</select>
									</div>
								</div>
								<h5>Package Options</h5>
								<div class="checkbox clearfix">
                                <?php
								
								$query = $this->common->getpackopt();
								foreach ($query as $row4) { 
								$checkopt=$this->common->getoption($row4->option_id, "2");
							if($checkopt) {
								$class = "checked";
							}
							else
							{
								$class = "";
							}
							?>
							
									<label class="col-md-2">
										<input type="checkbox"  value="<?php echo $row4->option_id?>" <?php echo $class?>  name="option[]"  /> <span class="checkbox-text"><?php echo $row4->option_name?></span>
									</label>
                                    <?php } ?>
	
								</div>
								
								<div class="form-group col-md-2">
									<input id="save_bronze_pack" type="submit" class="btn btn-primary" value="Save Package">
								</div>
							</div>
						</div>
                        </form>
                        <?php
						$row5 = $this->common->silverpack();
						?>
                        <form  id="save_sp" method="post" action="">
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Edit Silver Package</h3>
							</div>
							<div class="box-body clearfix">
								<div class="clearfix">
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Package Name</label>
										<input type="text" class="form-control" name="name" id="" value="<?php echo $row5->package_name?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputPassword1">Price (in GBP &pound;)</label>
										<input type="text" class="form-control" name="price" id="" value="<?php echo $row5->price?>" required>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Validity Period</label>
										<select class="form-control" name="validity">
											<option value="5" <?php if($row5->validity == 5) { echo $selected = "selected"; }?> >5 Days</option>
											<option value="10" <?php if($row5->validity == 10) { echo $selected = "selected"; }?>>10 Days</option>
											<option value="20" <?php if($row5->validity == 20) { echo $selected = "selected"; }?>>20 Days</option>
											<option value="30" <?php if($row5->validity == 30) { echo $selected = "selected"; }?>>30 Days</option>
											<option value="60" <?php if($row5->validity == 60) { echo $selected = "selected"; }?>>60 Days</option>
											<option value="90" <?php if($row5->validity == 90) { echo $selected = "selected"; }?>>90 Days</option>
											<option value="180" <?php if($row5->validity == 180) { echo $selected = "selected"; }?>>180 Days</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Published Within</label>
										<select class="form-control" name="published">
											<option value="1" <?php if($row5->pub_within == 1) { echo $selected = "selected"; }?>>1 Hour</option>
											<option value="8" <?php if($row5->pub_within == 8) { echo $selected = "selected"; }?>>8 Hours</option>
											<option value="24" <?php if($row5->pub_within == 24) { echo $selected = "selected"; }?>>24 Hours</option>
											<option value="48" <?php if($row5->pub_within == 48) { echo $selected = "selected"; }?>>48 Hours</option>
											<option value="72" <?php if($row5->pub_within == 72) { echo $selected = "selected"; }?>>72 Hours</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="exampleInputEmail1">Number of Photos</label>
										<select class="form-control" name="photos">
											<option value="5" <?php if($row5->photos == 5) { echo $selected = "selected"; }?>>5</option>
											<option value="20" <?php if($row5->photos == 20) { echo $selected = "selected"; }?>>20</option>
											<option value="30" <?php if($row5->photos == 30) { echo $selected = "selected"; }?>>30</option>
											<option value="50" <?php if($row5->photos == 50) { echo $selected = "selected"; }?>>50</option>
										</select>
									</div>
								</div>
								<h5>Package Options</h5>
								<div class="checkbox clearfix">
                                <?php
								
								$query = $this->common->getpackopt();
								foreach ($query as $row9) { 
								$checkopt=$this->common->getoption($row9->option_id, "3");
							if($checkopt) {
								$class = "checked";
							}
							else
							{
								$class = "";
							}
								?>
							
									<label class="col-md-2">
										<input type="checkbox"  value="<?php echo $row9->option_id?>" <?php echo $class?>  name="option[]"  /> <span class="checkbox-text"><?php echo $row9->option_name?></span>
									</label>
                                    <?php } ?>
								</div>
								
								<div class="form-group col-md-2">
									<input id="save_silver_pack" type="submit" class="btn btn-primary" value="Save Package">
								</div>
							</div>
						</div>
                        </form>
						<div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Edit Gold Package</h3>
							</div>
                            <?php
							$row7 = $this->common->goldpack();
							?>
                            <form id="save_gp" method="post" action="">
                                <div class="box-body clearfix">
                                    <div class="clearfix">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Package Name</label>
                                            <input type="text" class="form-control" name="name" id="" value="<?php echo $row7->package_name?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputPassword1">Price (in GBP &pound;)</label>
                                            <input type="text" class="form-control" name="price" id="" value="<?php echo $row7->price?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Validity Period</label>
                                            <select class="form-control" name="validity">
                                                <option value="5" <?php if($row7->validity == 5) { echo $selected = "selected"; }?> >5 Days</option>
                                                <option value="10" <?php if($row7->validity == 10) { echo $selected = "selected"; }?>>10 Days</option>
                                                <option value="20" <?php if($row7->validity == 20) { echo $selected = "selected"; }?>>20 Days</option>
                                                <option value="30" <?php if($row7->validity == 30) { echo $selected = "selected"; }?>>30 Days</option>
                                                <option value="60" <?php if($row7->validity == 60) { echo $selected = "selected"; }?>>60 Days</option>
                                                <option value="90" <?php if($row7->validity == 90) { echo $selected = "selected"; }?>>90 Days</option>
                                                <option value="180" <?php if($row7->validity == 180) { echo $selected = "selected"; }?>>180 Days</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Published Within</label>
                                            <select class="form-control" name="published">
                                                <option value="0" <?php if($row7->pub_within == 0) { echo $selected = "selected"; }?>>Immediate</option>
                                                <option value="1" <?php if($row7->pub_within == 1) { echo $selected = "selected"; }?>>1 Hour</option>
                                                <option value="8" <?php if($row7->pub_within == 8) { echo $selected = "selected"; }?>>8 Hours</option>
                                                <option value="24" <?php if($row7->pub_within == 24) { echo $selected = "selected"; }?>>24 Hours</option>
                                                <option value="48" <?php if($row7->pub_within == 48) { echo $selected = "selected"; }?>>48 Hours</option>
                                                <option value="72" <?php if($row7->pub_within == 72) { echo $selected = "selected"; }?>>72 Hours</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1">Number of Photos</label>
                                            <select class="form-control" name="photos">
                                                <option value="5" <?php if($row7->photos == 5) { echo $selected = "selected"; }?>>5</option>
                                                <option value="20" <?php if($row7->photos == 20) { echo $selected = "selected"; }?>>20</option>
                                                <option value="30" <?php if($row7->photos == 30) { echo $selected = "selected"; }?>>30</option>
                                                <option value="50" <?php if($row7->photos == 50) { echo $selected = "selected"; }?>>50</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5>Package Options</h5>
                                    <div class="checkbox clearfix">
                                        <?php

                                        $query = $this->common->getpackopt();
                                        foreach ($query as $row10) {
                                            $checkopt=$this->common->getoption($row10->option_id, "4");
                                            if($checkopt) {
                                                $class = "checked";
                                            }
                                            else
                                            {
                                                $class = "";
                                            }
                                            ?>

                                            <label class="col-md-2">
                                                <input type="checkbox"  value="<?php echo $row10->option_id?>" <?php echo $class?>  name="option[]"  /> <span class="checkbox-text"><?php echo $row10->option_name?></span>
                                            </label>
                                        <?php } ?>								</div>

                                    <div class="form-group col-md-2">
                                        <input id="save_gold_pack" type="submit" class="btn btn-primary" value="Save Package">
                                    </div>
                                </div>
                        </div>
                    </form>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->

            <!-- add new calendar event modal -->