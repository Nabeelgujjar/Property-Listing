
	
	<!-- Page Heading -->
	<div class="pageHeading">
		<div class="container">
			<h1>Properties for sale</h1>
		</div>
	</div>
	<!-- /.pageHeading -->
	
	<!-- Contents -->
	<div class="contents innerContents">
		<div class="container">
			<!-- Breadcrumb -->
			<ul class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Properties for sale</li>
			  <li class="pull-right"><a href="#">&laquo; Back to home</a></li>
			</ul>
			<!-- /.breadcrumb -->
			
			<div class="column-contents clearfix">
				<!-- Listing Column -->
				<div class="listing-column col-lg-9">
					<!-- Property Listing Filters -->
					<div class="property-listing-filters clearfix">
						<div class="col-sm-9 property-text-filters">
                        <?php $subp = $this->dbcommon->subprop() ?>
							<a href="<?php echo base_url()?>index.php/welcome/all_properties" class="active">All</a> &nbsp;
                            <?php foreach ($subp as $sub) {?> | &nbsp; <a href="<?php echo base_url()?>index.php/welcome/search_filter?sub_property=<?php echo $sub->sub_prop_id?>"><?php echo $sub->sub_prop_name?></a> <?php } ?>
						</div>
						<div class="col-sm-3">
                        	<form method="post" id="myForm" action="<?php echo base_url()?>index.php/welcome/search_filter">
							<select id="basic" name="sort" class="selectpicker" data-width="100%">	
                            	<?php if(isset($_POST['sort']) && $_POST['sort'] == "1") { 
								$prop = "selected='selected'";
                                }
								else
								{
									$prop = "";
								}?>
                                <?php if(isset($_POST['sort']) && $_POST['sort'] == "2") { 
								$price = "selected='selected'";
                                }
								else
								{
									$price = "";
								}?>
                                <?php if(isset($_POST['sort']) && $_POST['sort'] == "3") { 
								$price2 = "selected='selected'";
                                }
								else
								{
									$price2 = "";
								}?>
                                <option value="1" <?php echo $prop?>>Latest properties first</option>
								<option value="2" <?php echo $price?>>Price: Low to High</option>
								<option value="3" <?php echo $price2?>>Price: High to Low</option>
                                </select>
                                <?php if(isset($_POST['search'])) { ?>
                                <input type="hidden" name="search" value="<?php echo $_POST['search']?>" />
                                <?php }?>
                                <?php if(isset($_POST['property_type'])) { ?>
                                <input type="hidden" name="property_type" value="<?php echo $_POST['property_type']?>" />
                                <?php } ?>
							</form>
						</div>
					</div>
					<!-- /.property-listing-filters -->
					
					<!-- Featured Properties -->
					<div class="listing-page-featured">
						<h3>Featured Properties</h3>
						<div id="recentCarousel" class="carousel slide clearfix">                
							<!-- Carousel items -->
							<div class="carousel-inner carousel-small">
								<div class="item active">
									<div class="row">
                                    <?php
							$featuredproperties=$this->dbcommon->featuredproperties();
							
							$i=1;
							foreach($featuredproperties as $property) {
								$subprop=$this->dbcommon->getsubpropbyid($property->sub_prop_id);
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
										<div class="col-sm-4 thumbRecord"><a href="<?php echo base_url()?>index.php/welcome/view_detail/<?php echo $property->prop_id?>"><img src="<?php echo base_url()?>images/badgeFeatured.png" class="badgeFeatured"><img src="<?php echo base_url()?>images/propertyPic1.jpg" alt="Image" class="img-responsive thumb-rounded"><div class="property-price"><?php echo $price?></div><h5><?php echo $property->bedrooms?> bedroom <?php echo $subprop->sub_prop_name?> for <?php echo $type?></h5><p><?php echo $property->address?></p></a>
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
					<!-- /.recentCarousel -->
					
					<!-- Listing Records -->
					<div class="listing-records">
                    <?php
		
			foreach($query as $prop) {
			$getsubprop=$this->dbcommon->getsubpropbyid($prop->sub_prop_id);
			$getarea=$this->dbcommon->getareabyid($prop->area_id);
			
			if ($prop->prop_img == "" || $prop->prop_img == NULL ) {
				$prop_image = "no-image.jpg";
			} else  {
				$prop_image = $prop->prop_img;
			}
			if($prop->i_want_to == 1)
								{
									$type = "For Rent";
									$price = $prop->price."<sup>/month";
									}
									else{
										$type = "For Sale";
										$price = $prop->price;
										}
		?>
						<div class="listing-record-container clearfix">
							<div class="listing-thumb col-sm-3">
								<a href="<?php echo base_url()?>inex.php/welcome/view_detail/<?php echo $prop->prop_id?>"><img src="<?php echo base_url()?>images/propertyPic1.jpg" class="img-responsive img-rounded" alt=""></a>
							</div>
							<div class="listing-features col-sm-8">
								<h4><a href="<?php echo base_url()?>index.php/welcome/view_detail/<?php echo $prop->prop_id?>"><?php echo $prop->bedrooms?> bedroom <?php echo $getsubprop->sub_prop_name ?> <?php echo $type?></a></h4>
								<h6><?php echo $prop->address?></h6>
								<div class="property-price">&pound;<?php echo $price?></div>
								<ul>
									<li><?php echo $prop->bedrooms?> Bedrooms</li>
									<li><?php echo $prop->bathrooms?> Bathrooms</li>
									<li>1 Reception</li>
								</ul>
								<p><?php echo $prop->description?>... <a href="#">View Details &raquo;</a></p>
							</div>
						</div>
			<?php } ?>			
						
						
						
						<nav>
							<?php echo $pagination; ?>
						</nav>
					</div>
					<!-- /.listing-records -->
				</div>
				<!-- /.listingColumn -->
				
				<!-- Listing Sidebar -->
				<div class="listing-sidebar col-lg-3 pull-right">
					<div class="sidebar-form">
						<h4>Property Search</h4>
						<div class="sidebar-form-contents">
							<div class="radio" data-initialize="radio" id="PropertyTypeRadio">
								<label class="radio-custom">
									<input class="sr-only" name="propertyTypeRadio" type="radio" value="forSale" checked>
									<span>For Sale</span>
								</label>
								<label class="radio-custom">
									<input class="sr-only" name="propertyTypeRadio" type="radio" value="toRent">
									<span>To Rent</span>
								</label>
							</div>
							<label>Location</label>
							<input type="text" name="location" placeholder="e.g. TS8 0TG, Durham Rd. etc." class="form-control">
							<label>Price Range</label>
							<select id="basic" class="selectpicker" data-width="100%">
								<option>&pound;50,000 - &pound;80,000</option>
								<option>&pound;81,000 - &pound;100,000</option>
								<option>&pound;100,000 +</option>
							</select>
							<label>Number of Bedrooms</label>
							<select id="basic" class="selectpicker" data-width="100%">
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
							</select>
							<label>Area</label>
							<select id="basic" class="selectpicker" data-width="100%">
								<option>30 sqm</option>
								<option>40 sqm</option>
								<option>50 sqm</option>
								<option>60 sqm</option>
							</select>
							
							<input type="button" name="search" value="Search" class="btn btn-primary btn-block">
						</div>
					</div>

					<a href="#" class="sidebar-sellProperty">Sell Your Property</a>
				</div>
				<!-- /.listingSidebar -->
			</div>
		</div>
	</div>
	<!-- /.contents -->
    