
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>General Settings</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="col-md-6 padL0">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Social Media Settings</h3>
							</div><!-- /.box-header -->
							<div class="box-body table-responsive">
								<div class="form-group">
                                    <?php $social_link = $this->dbcommon->socialmediadetails()?>
									<label for="exampleInputEmail1">Facebook Link</label>
									<input type="text" name="fb_link" class="form-control" id="exampleInputEmail1" value="<?php echo $social_link->facebook?>" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Twitter Link</label>
									<input type="text" name="twitter_link" class="form-control" id="exampleInputEmail1"  value="<?php echo $social_link->twitter?>" required>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Google+ Link</label>
									<input type="text" name="google_link" class="form-control" id="exampleInputEmail1"  value="<?php echo $social_link->googleplus?>" required>
								</div>
								<input type="button" value="Save Social Settings" class="btn btn-primary">
							</div><!-- /.box-body -->
						</div>
					</div>
					<div class="col-md-6 padR0">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Meta Data</h3>
							</div><!-- /.box-header -->
							<div class="box-body table-responsive">
								<div class="form-group">
                                    <?php $meta = $this->dbcommon->metadetails();
                                    //print_r($meta);
                                    ?>

									<label for="exampleInputEmail1">Meta Title</label>
									<input type="text" name="meta_title" class="form-control" id="exampleInputEmail1" value="<?php echo $meta->meta_name?>"  required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Meta Keywords</label>
									<input type="text" name="meta_keys" class="form-control" id="exampleInputPassword1"  value="<?php echo $meta->meta_keys?>" required>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Meta Description</label>
									<textarea name="meta_desc" class="form-control" id="" required><?php echo $meta->meta_desc?></textarea>
								</div>
								<input type="button" id="meta_data" value="Save Data" class="btn btn-primary">
							</div><!-- /.box-body -->
						</div>
					</div>
					<div class="clearfix"></div>
                    <form id="app_method" enctype="multipart/form-data" method="post" action="">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Property Approval Method</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<div class="checkbox clearfix">
                                    <label class="col-md-3">
                                        <?php $con = $this->common->getcofig();
                                        ?>
                                       <?php if($con->approval_method === 'man'):?>
                                    <label>Automatic Approval</label> &nbsp; <input type="radio" name="app_method" value="auto" />
                                </label>
                                <label class="col-md-3">
                                    <label>Manual Approval</label> &nbsp; <input type="radio" name="app_method" value="man" checked/>
                                </label>
                               <?php else: ?>
                                <label>Automatic Approval</label> &nbsp; <input type="radio" name="app_method" value="auto" checked/>
                                </label>
                                <label class="col-md-3">
                                    <label>Manual Approval</label> &nbsp; <input type="radio" name="app_method" value="man" />
                                </label>
                                <?php endif; ?>
							</div>
							<input type="submit" value="Save Approval Method" class="btn btn-primary">
						</div><!-- /.box-body -->
					</div>
                    </form>
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Customize Emails</h3>
						</div><!-- /.box-header -->
						<div class="box-body clearfix">
							<div class="box-group" id="accordion">
								<div class="panel box">
									<div class="box-header">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="email-names">
												Account Success Email
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse">
										<div class="box-body">
											<div class="form-group">
												<label for="exampleInputEmail1">Email Subject</label>
                                                <?php $account_email = $this->dbcommon->accountemaildetails();
                                                print_r($account_email);
                                                ?>
												<input name="account_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $account_email->email_sub?>" required>

                                            </div>
											<div class="form-group">
												<label>Email Body</label>
												<div class='box-body pad'>
													<textarea  name="account_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $account_email->email_body?></textarea>
												</div>
											</div>
											<input id="acc_mail" type="button" value="Save Email" class="btn btn-primary">
										</div>
									</div>
								</div>
								<div class="panel box">
									<div class="box-header">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="email-names">
												Password Change Email
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse">
										<div class="box-body">
											<div class="form-group">
												<label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->passemaildetails()?>
												<input name="pass_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>
                                              
											</div>
											<div class="form-group">
												<label>Email Body</label>
												<div class='box-body pad'>
													<textarea name="pass_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
												</div>
											</div>
											<input id="pass_mail" type="button" value="Save Email" class="btn btn-primary">
										</div>
									</div>
								</div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="email-names">
                                                New Property Post Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->newpropemaildetails()?>
                                                <input name="prop_post_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="prop_post_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="prop_post_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="email-names">
                                                Property Approval Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->propappemaildetails()?>
                                                <input name="prop_app_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="prop_app_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="prop_app_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" class="email-names">
                                                Property Dis-Approval Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->propdisappemaildetails()?>
                                                <input name="prop_dis_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="prop_dis_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="prop_dis_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" class="email-names">
                                                Package Payment Success Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->packpaysuccemaildetails()?>
                                                <input name="pack_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="pack_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="pack_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" class="email-names">
                                                Package Payment Unsuccessful Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseEight" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->packpayunsuccemaildetails()?>
                                                <input name="pack_un_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="pack_un_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="pack_un_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" class="email-names">
                                                Featured Payment Success Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseNine" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->featpaysuccemaildetails()?>
                                                <input name="feat_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="feat_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="feat_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" class="email-names">
                                                Featured Payment Unsuccessful Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTen" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->featpayunsuccemaildetails()?>
                                                <input name="feat_un_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="feat_un_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="feat_un_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" class="email-names">
                                                SaleBoard Payment Success Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseEleven" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->salepaysuccemaildetails()?>
                                                <input name="sale_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="sale_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="sale_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel box">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" class="email-names">
                                                Saleboard Payment Unsuccessful Email
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwelve" class="panel-collapse collapse">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pass_email = $this->dbcommon->salepayunsuccemaildetails()?>
                                                <input name="sale_un_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pass_email->email_sub?>" required>

                                            </div>
                                            <div class="form-group">
                                                <label>Email Body</label>
                                                <div class='box-body pad'>
                                                    <textarea name="sale_un_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pass_email->email_body?></textarea>
                                                </div>
                                            </div>
                                            <input id="sale_un_mail" type="button" value="Save Email" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
								<div class="panel box">
									<div class="box-header">
										<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseThreen" class="email-names">
												Payment Confirmation Email
											</a>
										</h4>
									</div>
									<div id="collapseThreen" class="panel-collapse collapse">
										<div class="box-body">
											<div class="form-group">
												<label for="exampleInputEmail1">Email Subject</label>
                                                <?php $pay_email = $this->dbcommon->payemaildetails()?>
												<input name="pay_email_sub" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $pay_email->email_sub?>" required>
                                            </div>
											<div class="form-group">
												<label>Email Body</label>
												<div class='box-body pad'>
													<textarea name="pay_email_body" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $pay_email->email_body?></textarea>
												</div>
											</div>
											<input id="pay_mail" type="button" value="Save Email" class="btn btn-primary">
										</div>
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->
					</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
