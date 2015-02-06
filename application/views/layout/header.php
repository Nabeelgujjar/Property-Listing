<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
    <?php $this->load->view('layout/meta')?>  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link href="http://www.fuelcdn.com/fuelux/3.2.1/css/fuelux.min.css" rel="stylesheet">
    <!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="<?php echo base_url()?>public/magnific-popup/dist/magnific-popup.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/uploadify/uploadify.css">

    <title>Hunt Property - For a simple move!</title>
</head>
<body>

<!-- Top Bar -->
	<div class="topBar">
		<div class="container">
			<div class="col-lg-6">
				Empty Space
			</div>
			<div class="col-lg-6 text-right">
            <?php if($this->session->userdata('user_id') == "") { ?>
            
				<a href="<?php echo base_url()?>index.php/login">Login</a> &nbsp;|&nbsp; <a href="<?php echo base_url()?>index.php/login">Register</a> &nbsp;|&nbsp; <a href="#">Forgot Password?</a>
                <?php }
				else { ?>
                <a href="<?php echo base_url()?>login/logout">Logout</a>
                <?php } ?>
                
			</div>
		</div>
	</div>
	<!-- /.topBar -->
	
	<!-- Fixed Navbar -->
	<div class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#"><img src="<?php echo base_url()?>public/images/logo.png" alt="Hunt Property"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="<?php echo base_url()?>">Home</a></li>
					<li class="activeSell"><a href="#">Sell Property</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/property_for_sale">For Sale</a></li>
					<li><a href="<?php echo base_url()?>index.php/welcome/property_for_rent">To Rent</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->