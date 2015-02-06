            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Properties / <small>Properties To Rent</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
                    </ol>
                </section>                <!-- Main content -->
                <section class="content">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Properties To Rent &nbsp; <a href="<?php echo base_url()?>index.php/admin/property/add_property" class="btn btn-primary btn-sm">Post New Property</a>
                                <input type="button" id="delete_seleted_rent" class="btn btn-danger btn-sm" value="Delete Selected"/></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tbl-propertiesForSale" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        <input id="ptr_selectall" type="checkbox"/>
                                    </th>
                                    <th></th>
                                    <th>ID and Title</th>
                                    <th>Ad Poster</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($query as $row) {
                                    $subprop=$this->common->getsubpropbyid($row->sub_prop_id);
                                    if($row->i_want_to == 1)
                                    {
                                        $type = "For Rent";
                                        $price = $row->price."<sup>/month";
                                    }
                                    else{
                                        $type = "For Sale";
                                        $price = $row->price;
                                    }
                                    if($row->visible == 1)
                                    {
                                        $action = "<a href='http://uzairusman.com/hp/index.php/admin/property/blockprop/$row->prop_id'><i class='fa fa-ban'></i> Block</a>";
                                    }
                                    else
                                    {
                                        $action = "<a href='http://uzairusman.com/hp/index.php/admin/property/allowprop/$row->prop_id'><i class='fa fa-green fa-check'></i> Allow</a>";
                                    }
                                    ?>
                                    <tr>
                                        <td valign="middle">
                                            <div class="checkbox">
                                                <input class="checkbox1" type="checkbox"/>
                                            </div>
                                        </td>
                                        <td valign="middle"><a href="#"><img src="<?php if($row->prop_img != "") {
                                                    $property_img = explode(',',$row->prop_img);
                                                    echo base_url()."public/uploads/propimg/".$property_img[0]; } else { echo base_url()."uploads/no-image.jpg"; }?>" width="70" border="0" alt="<?php echo $row->bedrooms?> bedroom <?php echo $subprop->sub_prop_name?> for <?php echo $type; ?>" class="img-responsive"></a></td>
                                        <td valign="middle">
                                            <a href="#"><?php echo $row->prop_uni_id?></a><br />
                                            <span><?php echo $row->bedrooms?> bedroom <?php echo $subprop->sub_prop_name?> for <?php echo $type?></span>
                                        </td>
                                        <?php
                                        if($row->user_id == 0)
                                        {
                                            $poster = "admin";
                                        }
                                        else
                                        {
                                            $row2 = $this->common->userdetails($row->user_id);
                                            $poster = $row2->user_name;
                                        }
                                        ?>
                                        <td valign="middle"><a href="#"><?php echo $poster?></a></td>
                                        <td valign="middle"><?php echo $row->post_date?></td>
                                        <td valign="middle"><?php echo $subprop->sub_prop_name?></td>
                                        <td valign="middle" class="actions"><a href="<?php echo base_url()?>index.php/admin/property/edit_property/<?php echo $row->prop_id?>"><i class="fa fa-yellow fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp; <a class="delete_opt" href="<?php echo base_url()?>index.php/admin/property/delete/<?php echo $row->prop_id?>"><i class="fa fa-times"></i> Delete</a>&nbsp;&nbsp;&nbsp; <?php echo $action?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>
                                        <div class="checkbox">
                                            <input type="checkbox"/>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th>ID and Title</th>
                                    <th>Ad Poster</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->        <!-- add new calendar event modal -->