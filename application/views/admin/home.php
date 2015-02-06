
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Dashboard <small>Control panel</small></h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $this->common->totalfeaturdtoday()?>
                                    </h3>
                                    <p>
                                        Featured Properties<br>
										Today
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="<?php echo base_url()?>index.php/admin/property/featured" class="small-box-footer">
                                    View All <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $this->stat->gettodayprop()?>
                                    </h3>
                                    <p>
                                        Total Properties<br>
										Today
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    View All <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $this->stat->gettodayusers()?>
                                    </h3>
                                    <p>
                                        User Registrations<br>
										Today
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="<?php echo base_url()?>index.php/admin/users" class="small-box-footer">
                                    View All Users <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <?php
                                    $gold = $this->common->totalgoldtoday();
                                    $silver = $this->common->totalsilvertoday();
                                    $bronze = $this->common->totalbonzetoday();

                                    $gold_price = $this->common->goldprize();
                                    $gold_price = $gold_price[0]['price'];

                                    $silver_price = $this->common->goldprize();
                                    $silver_price = $silver_price[0]['price'];

                                    $bronze_price = $this->common->goldprize();
                                    $bronze_price = $bronze_price[0]['price'];

                                    $sale = ($gold * $gold_price) + ($silver * $silver_price) + ( $bronze * $bronze_price);

                                    ?>
                                    <h3>
                                        <sup style="font-size: 20px;">&pound;</sup><?php  echo $sale?>
                                    </h3>
                                    <p>
                                        Total Sales<br>
										Today
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="<?php echo base_url()?>index.php/admin/salesboard/sale_orders" class="small-box-footer">
                                    View All Sales <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <br/><br/>
                        <section class="content-header">
                            <h3>Property Statistics</h3>
                        </section>
                        <div class="box box-primary clearfix">
                            <div class="box-header">
                                <h3 class="box-title"><a href="#" class="btn btn-primary btn-sm"></a>
                                    <div id="reportrange" class="pull-right">
                                        <i class="fa fa-calendar fa-lg"></i>
                                        <span><?php echo date("F j, Y", strtotime('-7 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret""></b>
                                    </div>
                                </h3>
                            </div>
                            <div class="box-body clearfix">
                                <div class="clearfix">
                                    <div id="prop_view"></div>
                                </div>
                            </div>

                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

            <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
            <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
            <script >
                Morris.Line({
                    element: 'prop_view',
                    data: <?php echo $this->stat->getpropstat($s_date,$e_date)?>,
                    xkey: 'date',
                    ykeys: ['views'],
                    labels: ['Series views']
                });
            </script>