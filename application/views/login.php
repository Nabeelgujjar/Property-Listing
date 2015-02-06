
	
	<!-- Page Heading -->
	<div class="pageHeading">
		<div class="container">
			<h1>My Account</h1>
		</div>
	</div>
	<!-- /.pageHeading -->
	
	<!-- Contents -->
	<div class="contents innerContents">
		<div class="container">
			<!-- Breadcrumb -->
			<ul class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">My Account</li>
			  <li class="pull-right"><a href="#">&laquo; Back to home</a></li>
			</ul>
			<!-- /.breadcrumb -->
			
			<div class="column-contents">
				<div class="col-sm-5 loginBox">
					<h2>Login</h2>
                    <form action="<?php echo base_url()?>index.php/login/login" method="post">
                    <?php echo $msg?>
					<input type="text" name="email" placeholder="email address" class="form-control" required>
					<input type="password" name="password" placeholder="password" class="form-control" required>
					<div class="checkbox clearfix" data-initialize="checkbox" id="rememberMeCheckbox" >
						<label class="checkbox-custom">
							<input class="sr-only" name="propertyTypeRadio" type="checkbox">
							<span>Remember me</span>
							<span class="pull-right"><a href="#">Forgotten password?</a></span>
						</label>
					</div>					
					<input id="login_user" type="submit" name="submit" value="Login To My Account" class="btn btn-primary btn-block">
                    </form>				
				</div>
				<div class="col-sm-2 formVrDivider">&nbsp;</div>
				<div class="col-sm-5 loginBox">
					<h2>Create New Account</h2>
                    <form action="<?php echo base_url()?>index.php/login/register" method="post">
                        <? echo $create_msg?>
                    <input type="text" name="name" placeholder="full name" class="form-control" required>
					<input type="text" name="email" placeholder="email address" class="form-control" required>
                    <input type="password" name="password" placeholder="password" class="form-control" required>
                     <input type="text" name="phone" placeholder="Phone No" class="form-control" required>
                      <input type="text" name="city" placeholder="City" class="form-control" required>
					
					<input type="submit" name="submit" value="Create New Account" class="btn btn-primary btn-block">
                    </form>	
					
					<div class="registerTeaser">
						<h4>Create a new account and you will be able to:</h4>
						<ul class="list-ticks">
							<li>Sell your property for the best price</li>
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
							<li>Pellentesque lobortis eu ligula non iaculis</li>
						</ul>
						<div class="privacyNotice"><i class="fa fa-lock"></i> Your personal details are safe with us. For more info, read our <a href="#">privacy policy</a>.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
