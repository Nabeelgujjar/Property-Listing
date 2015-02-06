
	<!-- Main Search -->
	<div class="jumbotron">
		<div class="searchBox">
        	<?php $pagedetails = $this->dbcommon->homepagedetails();?>
			<h1 class="text-center"><?php echo $pagedetails->title?></h1>
			<h2 class="text-center"><?php echo $pagedetails->sub_title?></h2>
			<form class="form-group form-inline" role="form" method="post" action="<?php echo base_url()?>index.php/welcome/search_filter">
				<input type="text" name = "search" id ="search" placeholder="e.g. house">
				<select id="propertyType" name="property_type" class="selectpicker">
					<option value="2">For Sale</option>
					<option value="1">To Rent</option>
				</select>
				<input type="submit" class="btn btn-lg btn-primary" value="Find Properties">
			</form>
			<p class="text-center"><a href="<?php echo base_url()?>index.php/welcome/property_for_sale">View all properties for sale</a> &nbsp; | &nbsp; <a href="<?php echo base_url()?>index.php/welcome/property_for_rent">View all properties to rent</a> &nbsp; | &nbsp; <a href="#" class="link-Orange">Sell your property</a></p>
		</div>
	</div> 
	<!-- /.jumbotron -->
	
	<!-- Featured Properties -->
	<div class="featuredHome">
		<div class="container">
			<div class="clearfix">
				<h3>Featured Properties</h3> <a href="<?php echo base_url()?>welcome/all_properties" class="link-viewAll">View all properties <i class="fa fa-angle-double-right"></i></a>
			</div>
            <div id="featuredCarousel" class="carousel slide clearfix">                
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                      <div class="row">
                        	<?php
							$featuredproperties=$this->dbcommon->featuredproperties();
							
							$i=1;
							foreach($featuredproperties as $property) {
								if($property->i_want_to == 1)
								{
									$type = "For Rent";
									$price = $property->price."<sup>/month";
									}
									else{
										$type = "For Sale";
										$price = $property->price;
										}
							?>
                            <div class="col-sm-4 thumbRecord"><a href="<?php echo base_url()?>welcome/view_detail/<?php echo $property->prop_id?>"><img src="public/images/badgeFeatured.png" class="badgeFeatured"><span><?php echo $type?><br><strong>&pound;<?php echo $price?></strong></span><img src="images/propertyPic1.jpg" alt="Image" class="img-responsive thumb-rounded"></a>
                            </div>
                            <?php
								if($i%3==0) {
								?>
                                </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <?php
								}
								$i++;
							}
							?>
                        </div>
                    </div>
                </div>
                <!--/carousel-inner-->
				<a class="left carousel-control" href="#featuredCarousel" data-slide="prev"><img src="public/images/controlBig-left.png"></a>
                <a class="right carousel-control" href="#featuredCarousel" data-slide="next"><img src="public/images/controlBig-right.png"></a>
            </div>
   		</div>
	</div> 
	<!-- /.featuredHome -->
	
	<!-- Contents -->
	<div class="contents">
		<div class="container">
			<!-- Selling Home Text Banner -->
			<div class="banner-sellHome-text">
				<div class="col-sm-2"><h4><a href="#"><?php echo $pagedetails->ban?></a></h4></div>
				<div class="col-sm-6 sell-benefits">
					<ul>
						<li class="ico-rounded-users"><?php echo $pagedetails->ban_desc1?></li>
						<li class="ico-rounded-photos"><?php echo $pagedetails->ban_desc2?></li>
						<li class="ico-rounded-graph"><?php echo $pagedetails->ban_desc3?></li>
					</ul>
					<a href="#" class="btn btn-primary">Sell Your Property</a> &nbsp; <a href="#" class="btn btn-primary btn-yellow">Rent Out Your Property</a>
				</div>
			</div>
			<!-- /.banner-sellHome-text -->
			
			<!-- Text 3 Column -->
			<div class="text3column clearfix">
				<div class="col-sm-4 textBox1">
					<a href="#">
						<i class="fa fa-home"></i>
						<h3><?php echo $pagedetails->col1?></h3>
						<p><?php echo $pagedetails->col_des1?></p>
					</a>
				</div>
				<div class="col-sm-4 textBox2">
					<a href="#">
						<i class="fa fa-leaf"></i>
						<h3><?php echo $pagedetails->col2?></h3>
						<p><?php echo $pagedetails->col_des2?></p>
					</a>
				</div>
				<div class="col-sm-4 textBox3">
					<a href="#">
						<i class="fa fa-bullhorn"></i>
						<h3><?php echo $pagedetails->col3?></h3>
						<p><?php echo $pagedetails->col_des3?></p>
					</a>
				</div>
			</div>
			<!-- .text3column -->
			
			<!-- Recent Properties -->
			<div class="recentHome">
				<div class="container">
					<div class="clearfix">
						<h3>Recent Properties</h3> <a href="<?php echo base_url()?>welcome/all_properties" class="link-viewAll">View all properties <i class="fa fa-angle-double-right"></i></a>
					</div>
					<div id="recentCarousel" class="carousel slide clearfix">                
						<!-- Carousel items -->
						<div class="carousel-inner">
							<div class="item active">
								<div class="row">
									<?php
							$recentproperties=$this->dbcommon->recentproperties();
							
							$i=1;
							foreach($recentproperties as $recentprops) {
								if($recentprops->i_want_to == 1)
								{
									$type = "For Rent";
									$price = $recentprops->price."<sup>/month";
									}
									else{
										$type = "For Sale";
										$price = $recentprops->price;
										}
							?>
                            <div class="col-sm-4 thumbRecord"><a href="<?php echo base_url()?>welcome/view_detail/<?php echo $recentprops->prop_id?>"><img src="public/images/badgeFeatured.png" class="badgeFeatured"><span><?php echo $type?><br><strong>&pound;<?php echo $price?></strong></span><img src="images/propertyPic1.jpg" alt="Image" class="img-responsive thumb-rounded"></a>
                            </div>
                            <?php
								if($i%3==0) {
								?>
                                </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <?php
								}
								$i++;
							}
							?>
									
									
								</div>
							</div>
						</div>
						<!--/carousel-inner-->
						<a class="left carousel-control" href="#recentCarousel" data-slide="prev"><img src="public/images/controlBig-left-inverse.png"></a>
						<a class="right carousel-control" href="#recentCarousel" data-slide="next"><img src="public/images/controlBig-right-inverse.png"></a>
					</div>
				</div>
			</div> 
			<!-- /.recentHome -->
	
			<!-- Selling Home Banner -->
			<div class="container">
				<div class="banner-sellHome clearfix">
					<img src="public/images/banner-sellHome.png" border="0" alt="Sell Your Home" class="img-responsive pull-right">
					<div>
						<h4>Selling your home with hunt property</h4>
						<p>The real market-led value of your property today.</p>
						<a href="#" class="btn btn-primary btn-lg btn-normal">Become a seller now</a>
					</div>
				</div>
			</div>
			<!-- /.banner-sellHome -->
		</div>
	</div>
	<!-- /.contents -->
	
	

