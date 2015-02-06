 
 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Property Statistics</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <br/><br/>
                <div class="box box-primary clearfix">
							<div class="box-header">
								<h3 class="box-title">Region Statistics
                                         </h3>
                            </div>
							<div class="box-body clearfix">
								<div class="clearfix">
                    <div id="prop_view"></div>
                    </div>
                    </div>
                    </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
                    
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
<script >
      Morris.Bar({
  element: 'prop_view',
  data: <?php echo $query?>,
  xkey: 'area_name',
  ykeys: ['views'],
  labels: ['views']
});
    </script>
