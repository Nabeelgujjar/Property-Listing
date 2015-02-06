<!-- Footer -->
	<footer class="clearfix">
		<div class="container">
		  <div class="col-sm-6">
				<img src="<?php echo base_url()?>public/images/logo-footer.png" border="0" alt="Hunt Property - For a simple move">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<hr>
			  	<p class="footerCP">&copy 2014 - Hunt Property | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> - Website Development by Hunt</p>
			</div>
			<div class="col-sm-2 col-sm-offset-1">
				<h6>Links</h6>
				<ul class="footerLinks">
					<li><a href="#">Home</a></li>
					<li><a href="#">Sell Property</a></li>
					<li><a href="#">For Sale</a></li>
					<li><a href="#">To Rent</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-sm-3">
				<h6>Company Address</h6>
				<ul>
					<li><span class="glyphicon glyphicon-map-marker"></span> 108 Villa Precy Subdivision Kumintang Beunos Aires, Argentine.</li>
					<li><span class="glyphicon glyphicon-phone"></span> +54 (901) 4567 8990</li>
					<li><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:info@site.com">info@site.com</a></li>
					<li><span class="glyphicon glyphicon-camera"></span> Flickr: <a href="#">info@site.com</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<!-- /footer -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/bootstrap-select.js"></script>
<script src="http://www.fuelcdn.com/fuelux/3.3.1/js/fuelux.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>pulic/js/sticky.js"></script>
<!-- Gallery -->
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/gallery.js"></script>
<script src="<?php echo base_url()?>public/uploadify/jquery.uploadify.js" type="text/javascript"></script>

<script language="javascript">
	$('#rememberMeCheckbox').checkbox();
	$('#PropertyTypeRadio').radio();
	
	/* Carousels */
	$(document).ready(function() {
		$('#featuredCarousel').carousel({
			interval: 4000
		})
		$('#recentCarousel').carousel({
			interval: 4000
		})
	});
	
	/* Custom Select */
		$('.dropdown-menu a').on('click', function(){    
		$('.dropdown-toggle').html($(this).html() + '<span class="caret"></span>');    
	})
	
	/* Sidebar Float */
	$(".listing-sidebar").stick_in_parent();
	
</script>

<!-- Gallery -->
<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
	<div class="rg-image-wrapper">
		{{if itemsCount > 1}}
			<div class="rg-image-nav">
				<a href="#" class="rg-image-nav-prev">Previous Image</a>
				<a href="#" class="rg-image-nav-next">Next Image</a>
			</div>
		{{/if}}
		<div class="rg-image"></div>
		<div class="rg-loading"></div>
	</div>
</script>

<!-- Show Contact Form and Seller Number -->
<script language="javascript">
	function toggleSlides(){
		$('.toggler').click(function(e){
			var id=$(this).attr('id');
			var widgetId=id.substring(id.indexOf('-')+1,id.length);
			$('#'+widgetId).slideToggle();
			$(this).toggleClass('sliderExpanded');
			$('.closeSlider').click(function(){
					$(this).parent().hide('slow');
					var relatedToggler='toggler-'+$(this).parent().attr('id');
					$('#'+relatedToggler).removeClass('sliderExpanded');
			});
		});
	};
	$(function(){
		toggleSlides();
	});
	
	var showNumber = $(".showNumber");
	showNumber.on("click", function() {
	  showNumber.data("text-original", showNumber.text());
	  showNumber.text(showNumber.data("text-swap"));
	});
	
 $(document).ready(function() {
 var projects = [
<?php $getsubprop=$this->dbcommon->subprop();
foreach($getsubprop as $subprop) { ?>
"<?php echo $subprop->sub_prop_name?>",
<?php } ?>
];

 $("#search").autocomplete({
  source: projects
 });
 
 $(function() {
    $('#basic').change(function() {
        this.form.submit();
    });
});
});

var base_url = '<?php echo base_url(); ?>';

$('#file_upload').uploadify({
            'auto':false,
			
            'swf': base_url + 'public/uploadify/uploadify.swf',
            'uploader': base_url + 'post_property/add_property',
            'cancelImg': base_url + 'public/uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'2MB',
            'fileObjName':'file_upload',
            'buttonText':'Select Photo(s)',
            'multi':true,
            'removeCompleted':false
        });
</script>

<?php $this->load->view('admin/layout/scripts'); ?>