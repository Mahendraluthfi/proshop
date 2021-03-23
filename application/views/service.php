<br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Jasa Service</h3>
  </div>
  <div class="panel-body">  
  		<div class="row">
  			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  				<button type="button" class="btn btn-primary btn-sm btn-tambah"><i class="glyphicon glyphicon-plus"></i> Jasa Service</button><p></p>
  				<table class="table table-bordered table-hover" style="font-size: 13px;">
  					<thead>
  						<tr class="active">
  							<th width="1%">No</th>
  							<th>Nama Barang</th>  							
  							<th>Tindakan Service</th>
  							<th>Jumlah</th>
  							<th>Biaya</th>
  							<th>Subtotal</th>
  							<th>#</th>
  						</tr>
  					</thead>
  					<tbody id="show_table">
  						
  					</tbody>
  				</table>
  			</div>
  		</div>
  </div>
</div>

<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group row">
	  				<label class="control-label col-md-3">Invoice</label>			  				
	  				<label class="control-label col-md-9 text-primary"><?php echo $this->session->userdata('nomor_service'); ?></label>			  			
	  			</div>	
	  			<div class="form-group row">
	  				<label class="control-label col-md-3">Tanggal</label>			  				
	  				<label class="control-label col-md-9 text-primary"><?php echo date('d M Y') ?></label>			  				
	  			</div>				  	
	  			<div class="form-group row">
	  				<label class="control-label col-md-3">Kasir</label>			  				
	  				<label class="control-label col-md-9 text-primary">{<?php echo $this->session->userdata('user'); ?>}</label>			  				
	  			</div>				  	
	  			<div class="form-group row" style="margin-bottom: 0px; ">
	  				<label class="control-label col-md-3">Customer</label>			  				
	  				<div class="col-md-9">			  					
	  					<input type="text" class="form-control form-control-sm" name="customer" value="Umum">
	  				</div>
	  			</div>	
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group row">					
					<label class="form-control-label col-md-4">Subtotal</label>			  				
			    	<div class="col-md-8">
			    		<h4 class="text-right subtotal">Rp. </h4>
			    	</div>
				</div>	
				<div class="form-group row">					
					<label class="form-control-label col-md-4">Discount</label>			  				
			    	<div class="col-md-8">
			    		<div class="input-group">
					  		<span class="input-group-addon">Rp. </span>
					  		<input type="text" class="form-control text-right" name="discount" placeholder="0">		
					  	</div>
			    	</div>
				</div>	
				<div class="form-group row">										
			    	<div class="col-md-12">
			    		<div class="alert alert-success" style="margin: 0px;">
				    		<h4>Grand Total</h4>
				    		<span class="text-right"><h2 class="grand_total"></h2></span>
				    		<input type="hidden" name="grand_total">
				    	</div>
			    	</div>
				</div>	
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group row">					
					<label class="form-control-label col-md-4">Pembayaran</label>			  				
				    <div class="col-md-8">
				    	<div class="radio">
						  <label>
						    <input type="radio" name="payment" value="CASH" checked="">
						    CASH
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="payment" value="DEBIT/KREDIT">
						    DEBIT/KREDIT
						  </label>
						</div>
				    </div>
				</div>
				 <div class="form-group row">					
					<label class="form-control-label col-md-4">Total Bayar</label>			  				
				    <div class="col-md-8">
				    	<div class="input-group">
						  <span class="input-group-addon">Rp. </span>
						  <input type="text" class="form-control text-right" name="total_bayar" placeholder="0">					  
						</div>
				    </div>
				</div>	
				<div class="form-group row">					
					<label class="form-control-label col-md-4">Kembali</label>			  				
				    <div class="col-md-8">
				    	<div class="input-group">
						  <span class="input-group-addon">Rp. </span>
						  <input type="text" readonly="" name="kembali" class="form-control text-right" placeholder="0">					  
						</div>
				    </div>
				</div>	
				<div class="form-group row">					
					<label class="form-control-label col-md-4">Catatan</label>			  				
				    <div class="col-md-8">
				    	<textarea name="notice" class="form-control" placeholder="Catatan Pembayaran"></textarea>
				    </div>
				</div>	
				<div class="form-group row">									
				    <div class="col-md-12">
				    	<button type="button" class="btn btn-primary btn-block btn-checkout"><h4>Simpan & Cetak Nota</h4></button>
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
				<h4 class="modal-title">Tambah Jasa Service</h4>
			</div>
			<div class="modal-body">
				<form id="frm-add" class="form-horizontal">
					 <div class="form-group">
					    <label class="col-sm-3 control-label">Nama Barang</label>
					    <div class="col-sm-9">
					      <input name="namaBarang" type="text" class="form-control" placeholder="Nama Barang">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Tindakan Service</label>
					    <div class="col-sm-9">
					    	<textarea name="tindakan" class="form-control" placeholder="Tindakan Service"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Jumlah</label>
					    <div class="col-sm-9">
					      <input name="qty" type="number" min="1" class="form-control" placeholder="Jumlah Barang">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Biaya Service</label>
					    <div class="col-sm-9">
					      <input name="biaya" type="text" class="form-control" placeholder="Biaya Service" onkeyup="reformatText(this)">
					    </div>
					  </div>
					  
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-simpan">Tambahkan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

<script>
	$( document ).ready(function() {
		function numberWithCommas(x) {
			if (x !== null) {
		    	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}
		}

		view_table();
		function view_table() {
			var str_disc = $('[name="discount"]').val();
    		var disc = str_disc.replace(',','');
    		var str_total_bayar = $('[name="total_bayar"]').val();
    		var total_bayar = str_total_bayar.replace(',','');
			var id = '<?php echo $this->session->userdata('nomor_service'); ?>';
			$.ajax({
            	url : "<?php echo site_url('index.php/service/get_table')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data){
            	    var html = '';
        	        var i;
        	        var no = 1;
    	            for(i=0; i<data.length; i++){
                    html += "<tr>"+                        
                        "<td>"+no+++"</td>"+                        
                        "<td>"+data[i].namaBarang+"</td>"+                        
                        "<td>"+data[i].tindakan+"</td>"+                        
                        "<td>"+data[i].qty+"</td>"+                                                
                        "<td class='text-right'>"+numberWithCommas(data[i].biaya)+"</td>"+                        
                        "<td class='text-right'>"+numberWithCommas(data[i].subtotal)+"</td>"+                        
                        "<td><button type='button' class='btn btn-danger btn-xs hapus-item' data='"+data[i].id+"'><i class='fa fa-trash'></i></button></td>"+                        
                        "</tr>";
                    }
	                $('#show_table').html(html);
            	},
                	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
            	}
        	}); 

        	$.ajax({
            	url : "<?php echo site_url('index.php/service/get_subtotal')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data){
            		var sum_all = data.subtot-disc;
            		var kembali = total_bayar - sum_all;
            		if (data.subtot == null) {
            			$('.subtotal').text('Rp. 0');
            			$('.grand_total').text('Rp. 0');
            		}else{
            			$('.subtotal').text('Rp. '+numberWithCommas(data.subtot));
            			$('.grand_total').text('Rp. '+numberWithCommas(sum_all));
            			$('[name="grand_total"]').val(sum_all);
            			if (total_bayar != 0) {            				
            				$('[name="kembali"]').val(numberWithCommas(kembali));
            			}
            		}
            	},
                	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
            	}
        	}); 


		}

		$('.btn-tambah').on('click', function(){
			$('#modal-id').modal('show');
		});

		$('[name="discount"]').on('keyup', function(){			
			view_table();            
		});

		$('[name="total_bayar"]').on('keyup', function(){			
			view_table();
		});

		$('#show_table').on('click','.hapus-item', function(){
			var id = $(this).attr('data');
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/service/hapus_item')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){                        
                    view_table();
                }
            });    
		});

		$('.btn-simpan').on('click', function(){
			$.ajax({
            	url : "<?php echo site_url('index.php/service/add_item')?>/",
            	type: "POST",
	            data: $('#frm-add').serialize(),            
	            dataType: "JSON",
            	success: function(data){
            		view_table();
            		$('#modal-id').modal('hide');
            		$('#frm-add')[0].reset();
            		// console.log(data);
            	},
                	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
            	}
        	});
		});

		$('.btn-checkout').on('click',function(){
			var result = confirm('SIMPAN & CETAK NOTA ?');
			var payment = $('[name="total_bayar"]').val();
			if (payment == "") {
				alert('Masukkan Total Bayar terlebih dahulu !');
			}else{		
				if (result == 1) {
					var idService = '<?php echo $this->session->userdata('nomor_service'); ?>';
					var customer = $('[name="customer"]').val();
					var date = '<?php echo date('Y-m-d') ?>';
					var total = $('[name="grand_total"]').val();
					var discount = $('[name="discount"]').val();
					var pay_change = $('[name="kembali"]').val();
					var pay_method = $('[name="payment"]').val();
					var notice = $('[name="notice"]').val();

					$.ajax({
	            		url : "<?php echo site_url('index.php/service/confirm_service/')?>"+idService,
	        	    	type: "POST",
	    	        	dataType: "JSON",
	    	        	data : {
	    	        		customer: customer,
	    	        		date : date,
	    	        		total : total,
	    	        		discount : discount,
	    	        		payment : payment,
	    	        		pay_change : pay_change,
	    	        		pay_method : pay_method,
	    	        		notice : notice,
	    	        	},
		            	success: function(data){	
		            		setTimeout(function(){ 
		            			location.reload(); 
		            		}, 3000);
		            		window.open(
								  '<?php echo base_url('service/print/') ?>'+idService,
								  '_blank' // <- This is what makes it open in a new window.
								);
		            	},
	                		error: function (jqXHR, textStatus, errorThrown){
		                	alert('Error get data from ajax');
	            		}
	        		}); 

				}
			}
			// $('#modal-search').modal('show');
		});

	});

	String.prototype.reverse = function () {
		return this.split("").reverse().join("");
    }
    
    function reformatText(input) {        
        var x = input.value;
        x = x.replace(/,/g, ""); // Strip out all commas
        x = x.reverse();
        x = x.replace(/.../g, function (e) {
            return e + ",";
        }); // Insert new commas
        x = x.reverse();
        x = x.replace(/^,/, ""); // Remove leading comma
        input.value = x;
    }
</script>