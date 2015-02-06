<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hunt Property | Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
			li {
				margin: 0;
				padding: 0;
				list-style: none;
			}
			#pricePlans:after {
				content: '';
				display: table;
				clear: both;
			}
			
			#pricePlans {
				zoom: 1;
			}
			
			#pricePlans {
				max-width: 69em;
				margin: 0 auto;
			}
			#pricePlans #plans, #pricePlans #plans li, .planContainer, .planContainer .options {
				padding: 0;
			}
			#pricePlans #plans .plan {
				float: left;
				width: 100%;
				background: #f8f8f8;
				text-align: center;
				border-radius: 3px;
				margin: 0 0 20px 0;
				border: 1px solid #eee;
				border-top: 2px solid #00a65a;
			}
			#pricePlans #plans .plan li {
				margin: 0;
				padding: 0;
				background-image: none;
			}
			.planContainer .title h2 {
				font-size: 2.125em;
				font-weight: 600;
				color: #3e4f6a;
				margin: 0;
				padding: .6em 0;
			}
			.planContainer .price p {
				color: #fff;
				height: 2.6em;
				margin: 0 0 1em;
				font-size: 1.5em;
				font-weight: 700;
				line-height: 2.6em;
				background: #1f668f;
			}
			.planContainer .price p span {
				color: #b1d0e1;
				font-size: .8em !important;
				font-weight: 300;
			}
			.planContainer .options li {
				font-weight: 700;
				color: #364762;
				line-height: 2.5;
				border-bottom: 1px solid #e6e6e6;
			}
			.planContainer .options li i.fa-check {
				color: #0bae08;
				padding-right: 6px;
			}
			.planContainer .options li i.fa-times {
				color: #d90000;
				padding-right: 6px;
			}
			.planContainer .options li span {
				font-weight: 400;
				color: #979797;
			}
			.planContainer .link-purchase a {
				margin: 10px 0;
				text-transform: uppercase;
			}
			
			@media screen and (min-width: 481px) and (max-width: 768px) {
				#pricePlans #plans .plan {
					width: 49%;
					margin: 0 2% 20px 0;
				}
				#pricePlans #plans > li:nth-child(2n) {
					margin-right: 0;
				}
			}
			
			@media screen and (min-width: 769px) and (max-width: 1024px) {
				#pricePlans #plans .plan {
					width: 49%;
					margin: 0 2% 20px 0;
				}	
				#pricePlans #plans > li:nth-child(2n) {
					margin-right: 0;
				}
			}
			
			@media screen and (min-width: 1025px) {
				#pricePlans {
					margin: 2em auto;
				}	
				#pricePlans #plans .plan {
					width: 24%;
					margin: 0 1.33% 20px 0;
				
					-webkit-transition: all .25s;
					   -moz-transition: all .25s;
						-ms-transition: all .25s;
						 -o-transition: all .25s;
							transition: all .25s;
				}	
				#pricePlans #plans > li:last-child {
					margin-right: 0;
				}
				
				#pricePlans #plans .plan:hover {
					-webkit-transform: scale(1.04);
					   -moz-transform: scale(1.04);
						-ms-transform: scale(1.04);
						 -o-transform: scale(1.04);
							transform: scale(1.04);
				}	
				.planContainer .button a {
					-webkit-transition: all .25s;
					   -moz-transition: all .25s;
						-ms-transition: all .25s;
						 -o-transition: all .25s;
							transition: all .25s;
				}	
				.planContainer .button a:hover {
					background: #3e4f6a;
					color: #fff;
				}	
				.planContainer .button a.bestPlanButton:hover {
					background: #ff9c70;
					border: 2px solid #ff9c70;
				}
			}
		</style>
    </head>
<body>
<section id="pricePlans">
								<ul id="plans">
									<li class="plan">
										<ul class="planContainer">
                                        <?php
										$row = $this->common->freepack();
										?>
											<li class="title"><h2><?php echo $row->package_name?></h2></li>
											<li class="price"><p>&pound;<?php echo $row->price?> / <span><?php echo $row->validity?> days</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> <?php echo $row->pub_within?> Hours Approval</li>
													<li><i class="fa fa-check"></i> <?php echo $row->photos?> Photos</li>
                                     				<?php
								
								$query = $this->common->getpackopt();
								foreach ($query as $row2) { 
								$checkopt=$this->common->getoption($row2->option_id, "1");
								if($checkopt) {
								$class = "class='fa fa-check'";
								}
								else
								{
								$class = "class='fa fa-times'";
								}
								?>
							
									<li><i <?php echo $class?>></i> <?php echo $row2->option_name?></li>
                                    <?php } ?>
												
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
                                    <?php 
									$row3 = $this->common->bronzepack();
									?>
										<ul class="planContainer">
											<li class="title"><h2><?php echo $row3->package_name?></h2></li>
											<li class="price"><p>&pound;<?php echo $row3->price?> / <span><?php echo $row3->validity?> days</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> <?php echo $row3->pub_within?> Hours Approval</li>
													<li><i class="fa fa-check"></i> <?php echo $row3->photos?> Photos</li>
                                                    <?php
								
								$query2 = $this->common->getpackopt();
								foreach ($query2 as $row4) { 
								$checkopt=$this->common->getoption($row4->option_id, "2");
								if($checkopt) {
								$class = "class='fa fa-check'";
								}
								else
								{
								$class = "class='fa fa-times'";
								}
								?>
							
									<li><i <?php echo $class?>></i> <?php echo $row4->option_name?></li>
                                    <?php } ?>
							
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
										<ul class="planContainer">
                                        <?php 
										$row5 = $this->common->silverpack();
										?>
											<li class="title"><h2><?php echo $row5->package_name?></h2></li>
											<li class="price"><p>&pound;<?php echo $row5->price?> / <span><?php echo $row5->validity?> days</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> <?php echo $row5->pub_within?> Hour Approval</li>
													<li><i class="fa fa-check"></i> <?php echo $row5->photos?> Photos</li>
													<?php
								
								$query3 = $this->common->getpackopt();
								foreach ($query3 as $row6) { 
								$checkopt=$this->common->getoption($row6->option_id, "3");
								if($checkopt) {
								$class = "class='fa fa-check'";
								}
								else
								{
								$class = "class='fa fa-times'";
								}
								?>
							
									<li><i <?php echo $class?>></i> <?php echo $row6->option_name?></li>
                                    <?php } ?>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
										<ul class="planContainer">
                                        <?php 
										$row7 = $this->common->goldpack();
										?>
											<li class="title"><h2><?php echo $row7->package_name?></h2></li>
											<li class="price"><p>&pound;<?php echo $row7->price?> / <span><?php echo $row7->validity?> days</span></p></li>
											<li>
												<ul class="options">
                                                	<?php
													if($row7->pub_within == 0)
													{
														$time = "Immediate";
													}
													else
													{
														$time = $row7->pub_within."hours";
													}
													?>
													<li><i class="fa fa-check"></i> <?php echo $time?> Approval</li>
													<li><i class="fa fa-check"></i> <?php echo $row7->photos?> Photos</li>
													<?php
								
								$query4 = $this->common->getpackopt();
								foreach ($query4 as $row8) { 
								$checkopt=$this->common->getoption($row8->option_id, "4");
								if($checkopt) {
								$class = "class='fa fa-check'";
								}
								else
								{
								$class = "class='fa fa-times'";
								}
								?>
							
									<li><i <?php echo $class?>></i> <?php echo $row8->option_name?></li>
                                    <?php } ?>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
								</ul>
							</section>
</body>
</html>