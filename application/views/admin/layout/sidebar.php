<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo base_url()?>index.php/admin/home">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-home"></i>
                                <span>Properties</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>index.php/admin/property/sale"><i class="fa fa-angle-double-right"></i> Properties For Sale <small class="badge pull-right bg-green"><?php echo $this->common->totalpropforsale()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/property/rent"><i class="fa fa-angle-double-right"></i> Properties To Rent <small class="badge pull-right bg-green"><?php echo $this->common->totalpropforrent()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/property/featured"><i class="fa fa-angle-double-right"></i> Featured Properties <small class="badge pull-right bg-green"><?php echo $this->common->totalfeaturd()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/property/manage_featured"><i class="fa fa-angle-double-right"></i> Manage Featured</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/categories"><i class="fa fa-angle-double-right"></i> Manage Categories <small class="badge pull-right bg-green"><?php echo $this->common->totalcat()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/areas"><i class="fa fa-angle-double-right"></i> Manage Cities <small class="badge pull-right bg-green"><?php echo $this->common->totalarea()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/amenities"><i class="fa fa-angle-double-right"></i> Manage Amenities <small class="badge pull-right bg-green"><?php echo $this->common->totalamenity()?></small></a></li>
                                <li class="treeview">
									<a href="#"><i class="fa fa-database"></i> <span>Manage Packages</span> <i class="fa fa-angle-left pull-right"></i></a>
									<ul class="treeview-menu">
										<li><a href="<?php echo base_url()?>index.php/admin/package"><i class="fa fa-angle-double-right"></i> View All Packages <small class="badge pull-right bg-green">4</small></a></li>
										<li><a href="<?php echo base_url()?>index.php/admin/package/manage_packages"><i class="fa fa-angle-double-right"></i> Edit Packages</a></li>
										<li><a href="<?php echo base_url()?>index.php/admin/package/pack"><i class="fa fa-angle-double-right"></i> Manage Package Options</a></li>
									</ul>
								</li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i>
                                <span>Manage Pages</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit_homepage/1"><i class="fa fa-angle-double-right"></i> Home</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit/sell-property"><i class="fa fa-angle-double-right"></i> Sell Property</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit/about-us"><i class="fa fa-angle-double-right"></i> About Us</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit/contact-us"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit/privacy-policy"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/pages/edit/terms-of-use"><i class="fa fa-angle-double-right"></i> Terms of Use</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Sales</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>index.php/admin/salesboard/create_saleboard"><i class="fa fa-angle-double-right"></i> Saleboard Settings</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/salesboard/sale_orders"><i class="fa fa-angle-double-right"></i> All Orders  <small class="badge pull-right bg-green"><?php echo $this->common->totalsell()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/salesboard/sale_cancels"><i class="fa fa-angle-double-right"></i> Cancelled Orders  <small class="badge pull-right bg-red"><?php echo $this->common->totalcancel()?></small></a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>User Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>index.php/admin/users/create_user"><i class="fa fa-plus-square"></i> Create New User</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/users/create_admin"><i class="fa fa-plus-square"></i> Create New Admin</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/users"><i class="fa fa-angle-double-right"></i> View All Users  <small class="badge pull-right bg-green"><?php echo $this->stat->gettotalusers()?></small></a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/users/admins"><i class="fa fa-angle-double-right"></i> View All Admins  <small class="badge pull-right bg-green"><?php echo $this->stat->gettotalusers()?></small></a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i> <span>Site Statistics</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url()?>index.php/admin/stats/"><i class="fa fa-angle-double-right"></i> View Stat</a></li>
                                <li><a href="<?php echo base_url()?>index.php/admin/stats/prop_stat"><i class="fa fa-angle-double-right"></i> Property Views Stat</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="<?php echo base_url()?>index.php/admin/settings">
                                <i class="fa fa-gear"></i> <span>General Settings</span>
							</a>
						</li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>



