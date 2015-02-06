<?php
$row = $this->common->gethomepage();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hunt Property | Admin Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
        <meta name="description" content="<?php echo $row->meta_desc?>">
		<meta name="keywords" content="<?php echo $row->meta_keyword?>">
        <?php $this->load->view('admin/layout/meta'); ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="<?php echo base_url()?>public/images/logo.png" border="0" alt="Hunt Property">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="fa fa-warning"></i>
                               <span class="label label-warning">6</span>							</a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 6 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users success"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-home info"></i> 25 properties added
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-home warning"></i> 11 featured properties added
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-money success"></i> 16 orders completed
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> 1 order cancelled
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-lock warning"></i> You changed your password
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                      </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('admin_name'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url()?>public/admin/img/avatar3.png" class="img-circle" alt="Administrator" />
                                    <p>
                                        <?php echo $this->session->userdata('admin_name'); ?>
                                        <small>Member since <?php echo $this->session->userdata('date'); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url()?>index.php/admin/login/sign_out" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('admin/layout/sidebar'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
