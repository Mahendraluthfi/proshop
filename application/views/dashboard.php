 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<style>
    .huges{
        font-size: 2em;
    }
</style>
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-dropbox fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $rprod ?></div>
                        <div>Produk</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('product') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-hourglass-3 fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $alert ?></div>
                        <div>Stok Menipis</div>
                    </div>
                </div>
            </div>
            <a href="#" onclick="stok()">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bars fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $rtype ?></div>
                        <div>Kategori Produk</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('type') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $rsupplier ?></div>
                        <div>Supplier</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('supplier') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-md-8">
         <div id="container"></div>
    </div>        
    <div class="col-lg-4 col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-dollar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huges"><?php echo number_format($todayomzet->totaltoday) ?></div>
                        <div>Omzet Penjualan hari ini</div>
                    </div>
                </div>
            </div>
            <!-- <a href="<?php echo base_url('product') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a> -->
        </div>

         <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cogs fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huges"><?php echo number_format($todayservice->totaltoday) ?></div>
                        <div>Omzet Service hari ini</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>         

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <h4 class="modal-title">Stok Barang Limit</h4>
            </div>
            <div class="modal-body">
                 <table class="table table-bordered table-hover" style="font-size: 12px;">
                  <thead>
                     <tr class="active">
                        <th width="1%">No</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <!-- <th>Kategori</th>                         -->
                        <th width="1%">Stok</th>                                  
                     </tr>
                  </thead>
                  <tbody>
                      <?php $no=1; foreach ($showless as $data) { ?>
                      <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $data->barcode ?></td>
                          <td><?php echo $data->productName ?></td>                          
                          <td class="bg-danger"><?php echo $data->productStock ?></td>                          
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Tutup</button>                
            </div>
        </div>
    </div>
</div>

<script>

    function stok() {
        $('#modal-id').modal('show');
    }

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Produk Terjual Hari Ini'
    },
    subtitle: {
        // text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
           <?php foreach ($todaysale as $data) {
               echo "'".$data->productName."',";
            } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'pcs'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah terjual',
        data: [
            <?php foreach ($todaysale as $data) {
                echo $data->totaljual.",";
            } ?>
        ]

    }]
});
</script>