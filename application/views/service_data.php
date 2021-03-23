<br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Data Service</h3>
  </div>
  <div class="panel-body">      
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
            <div class="table-responsive">                    
                <table class="table table-bordered table-hover" id="example" style="font-size: 12px;">
                    <thead>
                        <tr class="active">
                            <th width="1%">No</th>
                            <th>Nota Service</th>
                            <th>Date</th>           
                            <th>Customer</th>
                            <th>TotalHarga</th>
                            <th>Bayar</th>
                            <th>Kasir</th>
                            <th>Note</th>
                            <th width="1%">Aksi</th>           
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($get as $data) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->idService ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data->date)) ?></td>
                                <td><?php echo $data->customer ?></td>
                                <td><?php echo number_format($data->total) ?></td>
                                <td><?php echo $data->pay_method ?></td>
                                <td><?php echo $data->kasir ?></td>
                                <td><?php echo $data->notice ?></td>
                                <td>
                                    <button type="button" onclick="detail('<?php echo $data->idService ?>')" class="btn btn-xs btn-primary" style="margin-bottom: 3px;">Detail</button><br>
                                    <a href="<?php echo base_url('service/print/'.$data->idService) ?>" target="_blank" class="btn btn-xs btn-success">Cetak</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            
            </div>
        </div>
      </div>

  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail Invoice</h3>
            </div>
            <div class="modal-body form">
                <div class="container-fluid">
                    <table class="table table-condensed" id="tb">
                        <thead>
                           	<tr class="info">
								<th>Nota Service</th>								
                                <th>Nama Barang</th>
                                <th>Tindakan</th>
                                <th>Jumlah</th>
								<th>Biaya</th>								
								<th>Subtotal</th>								
							</tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>               
                </div>           
            </div>
            <div class="modal-footer">            
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>  
  var table;  
    
  function numberWithCommas(x) {
    if (x !== null) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }

  function detail(id) {
		var a = $('#tb').DataTable();           
        a.clear().draw();
        a.destroy();
        $.ajax({
            url : "<?php echo site_url('index.php/service/get_detail')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += "<tr>"+                        
                        "<td>"+data[i].idService+"</td>"+                        
                        "<td>"+data[i].namaBarang+"</td>"+
                        "<td>"+data[i].tindakan+"</td>"+
                        "<td>"+data[i].qty+"</td>"+
                        "<td>"+numberWithCommas(data[i].biaya)+"</td>"+                        
                        "<td>"+numberWithCommas(data[i].subtotal)+"</td>"+                        
                        "</tr>";
                    }
                $('#show_data').html(html);
                $('#tb').DataTable();
                $('#modal_detail').modal('show'); // show bootstrap modal when complete loaded                        
            },
                error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        }); 
	}
</script>