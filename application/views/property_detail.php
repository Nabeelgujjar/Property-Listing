
	<?php
					if($propdetails->i_want_to == 1)
					{
						$type = "RENT";
						
					}
					else
					{
						$type = "SALE";
						
					}
					?>
	<!-- Page Heading -->
	<div class="pageHeading">
		<div class="container">
			<h1>Properties for <?php echo $type?></h1>
		</div>
	</div>
	<!-- /.pageHeading -->
	
	<!-- Contents -->
	<div class="contents innerContents">
		<div class="container">
			<!-- Breadcrumb -->
			<ul class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li><a href="#">Properties for sale</a></li>
			  <li class="active"><?php echo $title?></li>
			  <li class="pull-right"><a href="#">&laquo; Back to properties for sale</a></li>
			</ul>
			<!-- /.breadcrumb -->
			
			<!-- Property Headings -->
			<div class="propertyHdng clearfix">
				<div class="col-sm-8"><h2><?php echo $title?></h2></div>
				<div class="col-sm-4"><a href="#" class="link_propertyGG">Google +</a> <a href="#" class="link_propertyTW">Twitter</a> <a href="#" class="link_propertyFB">Facebook</a></div>
			</div>
			<!-- /.propertyHdng -->
			
			<div class="column-contents clearfix">
				<!-- Property Features -->
				<div class="property-details col-lg-5">
					
					<!-- Price & Contact -->
                    <?php
					if($propdetails->i_want_to == 1)
					{
						$type = "For Rent";
						$price = $propdetails->price."<sup>/month";
					}
					else
					{
						$type = "For Sale";
						$price = $propdetails->price;
					}
					?>
					<div class="property-price-contact clearfix">
						<div class="pDetail-price col-md-4">&pound;<?php echo $price?></div>
						<div class="pDetail-contact col-md-8">
							<div class="pDetail-emailSeller toggler" id="toggler-slideOne">
								<i class="fa fa-envelope"></i> <span class="expandSlider">Email to Seller</span></div> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
							<div class="pDetail-showNumber">
								<i class="fa fa-phone"></i> <span class="showNumber" data-text-swap="0044 987 654 3210">Show Phone Number</span></div>
						</div>
					</div>
					<div class="emailSeller" id="slideOne">
						<form method="post" action="<?php echo base_url()?>welcome/sendmail">
							<h5>Email Seller</h5>
							<input type="text" name="name" placeholder="Full Name" class="form-control">
							<input type="text" name="email" placeholder="Email Address" class="form-control">
							<input type="text" name="phone" placeholder="Phone Number" class="form-control">
							<textarea name="message" rows="" cols="" placeholder="Message here..." class="form-control"></textarea>
                            <input type="hidden" name="id" value="<?php echo $propdetails->prop_id?>" />
							<input type="button" value="Send Message" class="btn btn-primary" />
						</form>
					</div>
					
					<!-- Main Features -->
					<div class="property-mainFeatures clearfix">
						<div class="col-sm-3">Area: <?php echo $propdetails->plot_area?></div>
						<div class="col-sm-3">Bedrooms: <?php echo $propdetails->bedrooms?></div>
						<div class="col-sm-3">Bathrooms: <?php echo $propdetails->bathrooms?></div>
						<div class="col-sm-3">Reception: 1</div>
					</div>
					
					<!-- Amenities -->
					<div class="property-amenities clearfix">
						<h5>Amenities:</h5>
                        <ul>
                         <?php
						$getallame=$this->dbcommon->getallamenities();
						
						$i=1;
						foreach($getallame as $amenity) {
							$checkame=$this->dbcommon->getpropamenity($amenity->amenity_id, $id);
							if($i%11 == 0) {
								?>
                                </ul>
                                <ul class="span2">
                                <?php
							}
							
							if($checkame) {
								
							
							?>
                                <li class="col-sm-6"><?php echo $amenity->amenity_name; ?></li>
                            <?php
							$i++;
						}
						}
						?>
					</ul>
					</div>
					
					<div class="property-description">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tabDesc" data-toggle="tab">Property Description</a></li>
							<li><a href="#tabFloor" data-toggle="tab">Floorplan &amp; EPC</a></li>
						</ul>
						<div class="tab-content">
							<div id="tabDesc" class="tab-pane active">
								<h5>Key Features</h5>
								<ul>
									<li><?php echo $propdetails->description?></li>
									<li>Entrance Lobby, Reception Hallway, Cloakroom &amp; Separate WC</li>
									<li>Sitting Room, Games Room, Dining Room, Family Room</li>
								</ul>
								<p>A magnificent Grade II Listed, Georgian residence in enjoying a prime position, prominently situated on the picturesque Norton High Street. This delightful house has been painstakingly restored to an exceptional standard by the present owners in recent years to provide simply stunning accommodation enhanced by a wealth of style, charm, character and history.</p>
								<p>The site comprises two main buildings which are set to the north of the site. The main access to the site is via a private curved driveway via Clifton Hill leading on to a large car parking area for approximately 20 vehicles. Emmaus House consists of two adjoining houses which are Grade II Listed and believed to date back to the early 18th century, one in Queen Ann style and the other Georgian. Both houses were family homes for many years before they were  converted into institutional use which continues today.</p>
								<p>Presented to the market in exceptional order thorough and stunning ground floor conversion flat, with a wealth of period features. The property comprises of a spacious open plan reception/kitchen with feature fire place and high ceilings throughout. Further comprising of a section of garden and being conveniently placed for excellent transport links into the centre of London.</p>
							</div>
							<div id="tabFloor" class="tab-pane">
								<h5>Floorplan</h5>
								<a href="http://distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                <img src="http://distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" class="img-responsive">
                            </a>
								<h5>Floorplan</h5>
								<a href="http://distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                <img src="http://distilleryimage6.ak.instagram.com/ba70b8e8030011e3a31b22000a1fbb63_7.jpg" class="img-responsive">
                            </a>
							</div>
						</div><!-- /.tab-content -->
					</div><!-- /.tabbable -->
				</div>
				<!-- /.listingColumn -->
				
				<!-- Property Gallery -->
				<div class="property-gallery col-lg-7">
					<div id="rg-gallery" class="rg-gallery">
						<div class="rg-thumbs">
							<div class="es-carousel-wrapper">
								<div class="es-nav">
									<span class="es-nav-prev">Previous</span>
									<span class="es-nav-next">Next</span>
								</div>
								<div class="es-carousel">
									<ul>
                                    	<a class="image-link" href="<?php echo base_url()?>images/propertyPic1.jpg">image</a>

										<li><a href="#"><img src="images/thumbs/1.jpg" data-large="images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>
										<li><a href="#"><img src="images/thumbs/2.jpg" data-large="images/2.jpg" alt="image02" data-description="A plaintful story from a sistering vale" /></a></li>
										<li><a href="#"><img src="images/thumbs/3.jpg" data-large="images/3.jpg" alt="image03" data-description="A plaintful story from a sistering vale" /></a></li>
										<li><a href="#"><img src="images/thumbs/4.jpg" data-large="images/4.jpg" alt="image04" data-description="My spirits to attend this double voice accorded" /></a></li>
										<li><a href="#"><img src="images/thumbs/5.jpg" data-large="images/5.jpg" alt="image05" data-description="And down I laid to list the sad-tuned tale" /></a></li>
										<li><a href="#"><img src="images/thumbs/6.jpg" data-large="images/6.jpg" alt="image06" data-description="Ere long espied a fickle maid full pale" /></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="sidebar-map">
                    <?php
					$areaname = $this->dbcommon->getareabyid($propdetails->area_id);
					$address = $areaname->area_name;
					?>
						<h5>View on Map:</h5>
						<iframe src="https://maps.google.co.za/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo str_replace(" ", "+", $address); ?>&amp;aq=&amp;ie=UTF8&amp;output=embed" width="600" height="450" frameborder="0" style="border:0"></iframe>
					</div>
				</div>
				<!-- /.property-gallery -->				
				
			</div>
			
			<div class="link-backHome"><a href="#">&laquo; Back to properties for sale</a></div>
			
			<div class="recentHome">
				<div class="container">
					<div class="clearfix">
						<h3>Similar Properties In This Area</h3> <a href="#" class="link-viewAll">View all properties <i class="fa fa-angle-double-right"></i></a>
					</div>
					<div id="recentCarousel" class="carousel slide clearfix">                
						<!-- Carousel items -->
						<div class="carousel-inner">
							<div class="item active">
								<div class="row">
									<?php
							$propertiesbyarea=$this->dbcommon->getpropertybyarea($propdetails->area_id);
							
							$i=1;
							foreach($propertiesbyarea as $areaprops) {
								if($areaprops->i_want_to == 1)
								{
									$type = "For Rent";
									$price = $areaprops->price."<sup>/month";
									}
									else{
										$type = "For Sale";
										$price = $areaprops->price;
										}
							?>
                            <div class="col-sm-4 thumbRecord"><a href="<?php echo base_url()?>welcome/view_detail/<?php echo $areaprops->prop_id?>"><img src="<?php echo base_url()?>images/badgeFeatured.png" class="badgeFeatured"><span><?php echo $type?><br><strong>&pound;<?php echo $price?></strong></span><img src="<?php echo base_url()?>images/propertyPic1.jpg" alt="Image" class="img-responsive thumb-rounded"></a>
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
						<a class="left carousel-control" href="#recentCarousel" data-slide="prev"><img src="<?php echo base_url()?>images/controlBig-left-inverse.png"></a>
						<a class="right carousel-control" href="#recentCarousel" data-slide="next"><img src="<?php echo base_url()?>images/controlBig-right-inverse.png"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.contents -->