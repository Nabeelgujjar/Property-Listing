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
											<li class="title"><h2>Free</h2></li>
											<li class="price"><p>&pound;0.00 / <span>10 days</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> 48 Hours Approval</li>
													<li><i class="fa fa-check"></i> 5 Photos</li>
													<li><i class="fa fa-times"></i> Upload Floorplan</li>
													<li><i class="fa fa-times"></i> Upload EPC</li>
													<li><i class="fa fa-times"></i> Social Sharing</li>
													<li><i class="fa fa-times"></i> Statistics</li>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
										<ul class="planContainer">
											<li class="title"><h2>Bronze</h2></li>
											<li class="price"><p>&pound;29.99 / <span>30 days</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> 8 Hours Approval</li>
													<li><i class="fa fa-check"></i> 20 Photos</li>
													<li><i class="fa fa-check"></i> Upload Floorplan</li>
													<li><i class="fa fa-check"></i> Upload EPC</li>
													<li><i class="fa fa-check"></i> Social Sharing</li>
													<li><i class="fa fa-check"></i> Statistics</li>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
										<ul class="planContainer">
											<li class="title"><h2>Silver</h2></li>
											<li class="price"><p>&pound;69.99 / <span>3 months</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> 1 Hour Approval</li>
													<li><i class="fa fa-check"></i> 30 Photos</li>
													<li><i class="fa fa-check"></i> Upload Floorplan</li>
													<li><i class="fa fa-check"></i> Upload EPC</li>
													<li><i class="fa fa-check"></i> Social Sharing</li>
													<li><i class="fa fa-check"></i> Statistics</li>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
						
									<li class="plan">
										<ul class="planContainer">
											<li class="title"><h2>Gold</h2></li>
											<li class="price"><p>&pound;99.99 / <span>6 months</span></p></li>
											<li>
												<ul class="options">
													<li><i class="fa fa-check"></i> Immediate Approval</li>
													<li><i class="fa fa-check"></i> 50 Photos</li>
													<li><i class="fa fa-check"></i> Upload Floorplan</li>
													<li><i class="fa fa-check"></i> Upload EPC</li>
													<li><i class="fa fa-check"></i> Social Sharing</li>
													<li><i class="fa fa-check"></i> Statistics</li>
												</ul>
											</li>
											<li class="link-purchase"><a href="#" class="btn btn-success">Select This Package</a></li>
										</ul>
									</li>
								</ul>
							</section>
</body>
</html>