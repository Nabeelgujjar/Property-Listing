

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Properties / <small>Properties For Sale</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-dashboard"></i> Go back to dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="tbl-propertiesForSale" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Region</th>
                        <th>Total Views</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($query as $row) {
                        ?>
                        <tr>
                            <td >
                                <a href="#"><?php echo $row->area_name?></a><br>
                            </td>

                            <td><?php echo $this->stat->areaviews($row->area_id)?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Region</th>
                        <th>Total Views</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- add new calendar event modal -->
