<br>
<div class="row">
	<div class="col-md-12 col-lg-12">
		<legend>Transaksi Penjualan</legend>		
	</div>	
</div>

<div class="row">
	<div class="col-md-8 col-lg-8">
		<div class="row">
			<div class="col-md-5 col-lg-5">
				<div class="panel panel-default">
				  <div class="panel-body">				  	
			  			<div class="form-group row">
			  				<label class="control-label col-md-3">Invoice</label>			  				
			  				<label class="control-label col-md-9 text-primary"><?php echo $this->session->userdata('nomor_invoice'); ?></label>			  			
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
			<div class="col-md-7 col-lg-7">
				<div class="panel panel-default">
				  <div class="panel-body">
				  	<label class="form-control-label">Tambah Item</label>
				  	<input type="text" class="form-control" placeholder="Scan Barcode disini" id="barcode" name="barcode" autofocus="">
				  	<hr>
				  	<button type="button" class="btn btn-warning btn-block btn-cari"><i class="fa fa-search"></i> Cari Produk</button>
				  </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="panel panel-default">
				  <div class="panel-body">
				  	<label class="form-control-label">Daftar Item</label>				  	
				 	<table class="table table-bordered" style="font-size: 13px;">
				 		<thead>
				 			<tr bgcolor="#eee">
				 				<th width="1%">No</th>
				 				<th>Nama Produk</th>
				 				<th>Harga</th>
				 				<th width="1%">Jumlah</th>
				 				<th>Subtotal</th>
				 				<th width="1%">#</th>
				 			</tr>
				 		</thead>
				 		<tbody id="show_table">
				 			
				 		</tbody>
				 	</table>
				  </div>
				</div>
			</div>

		</div>

	</div>
	<div class="col-md-4 col-lg-4">
		<div class="panel panel-default">
		  <div class="panel-body">
		  	<legend style="margin-bottom: 0px;">Subtotal</legend>
		   	<div class="form-group row">		   		
			    <div class="col-md-12 text-right">
			    	<h2 class="subtotal"></h2>
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

<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modal-id" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Jumlah</h4>
			</div>
			<div class="modal-body">
				<center><span class="nama_produk"></span></center><br>
				<form id="frm">
					<input type="hidden" name="idInvoice">
					<input type="hidden" name="idProduct">
					<input type="number" class="form-control text-center" min="1" name="jmlbeli"><br>
					<button type="button" class="btn btn-primary btn-block update-jml">Update</button>
				</form>
			</div>			
		</div>
	</div>
</div>

<div class="modal fade" id="modal-search">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cari Produk</h4>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" name="" placeholder="Cari nama produk . . ." id="sample_search"><hr>
				<div class="list-group list-search">
					
				</div>
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

    		var id = '<?php echo $this->session->userdata('nomor_invoice'); ?>';
    		$.ajax({
            	url : "<?php echo site_url('index.php/invoice/get_table')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data){
            	    var html = '';
        	        var i;
        	        var no = 1;
    	            for(i=0; i<data.length; i++){
                    html += "<tr>"+                        
                        "<td>"+no+++"</td>"+                        
                        "<td>"+data[i].productName+"</td>"+                        
                        "<td class='text-right'>"+numberWithCommas(data[i].price)+"</td>"+                        
                        "<td class='text-center'>"+
                        	"<button type='button' class='btn btn-block btn-secondary btn-xs ubah-jumlah' data='"+data[i].idProduct+"' data-invoice='"+data[i].idInvoice+"' data-jml='"+data[i].qty+"' data-namaproduk='"+data[i].productName+"'>"+data[i].qty+"</button>"+                        	
                        "</td>"+
                        "<td class='text-right'>"+numberWithCommas(data[i].subtotal)+"</td>"+                        
                        "<td><button type='button' class='btn btn-danger btn-xs hapus-item' data='"+data[i].idProduct+"' data-invoice='"+data[i].idInvoice+"'><i class='fa fa-trash'></i></button></td>"+                        
                        "</tr>";
                    }
	                $('#show_table').html(html);
            	},
                	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
            	}
        	}); 

        	$.ajax({
            	url : "<?php echo site_url('index.php/invoice/get_subtotal')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data){
            		var sum_all = data.subtotal-disc;
            		var kembali = total_bayar - sum_all;
            		if (data.subtotal == null) {
            			$('.subtotal').text('Rp. 0');
            			$('.grand_total').text('Rp. 0');
            		}else{
            			$('.subtotal').text('Rp. '+numberWithCommas(data.subtotal));
            			$('.grand_total').text('Rp. '+numberWithCommas(sum_all));
            			$('[name="grand_total"]').val(sum_all);
            			if (total_bayar != 0) {            				
            				$('[name="kembali"]').val(numberWithCommas(kembali));
            			}
            		}
            		// console.log(total_bayar);
            	},
                	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
            	}
        	}); 
    	}

    	$('#show_table').on('click','.hapus-item',function(){
        	var idp = $(this).attr('data');                        
        	var id = $(this).attr('data-invoice');                        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/invoice/hapus_item')?>",
                dataType : "JSON",
                data : {idProduct: idp, idInvoice:id},
                success: function(data){                        
                    view_table();
                }
            });                                                      
    	});

    	$('#show_table').on('click','.ubah-jumlah',function(){
        	var idp = $(this).attr('data');                        
        	var id = $(this).attr('data-invoice');                        
        	var jml = $(this).attr('data-jml');                        
        	var namaproduk = $(this).attr('data-namaproduk');

        	$('[name="jmlbeli"]').val(jml);
        	$('[name="idInvoice"]').val(id);
        	$('[name="idProduct"]').val(idp);
        	$('.nama_produk').text(namaproduk);
			$('#modal-id').modal('show');                                                       

    	});

    	$('.update-jml').on('click',function(){
        	// console.log('update');
        	$.ajax({
	            url : '<?php echo base_url('invoice/update_jml_item') ?>',
	            type: "POST",
	            data: $('#frm').serialize(),            
	            dataType: "JSON",
	            success: function(data)
	            {
	            	if(data == false){
	            		alert('Jumlah beli melebihi stok barang !');
	            	}else{
		            	$('#modal-id').modal('hide');
		            	view_table();	            		
	            	}
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error adding / update data');
	            }
	        });
    	});

    	var query = document.getElementById("barcode");
		query.addEventListener("keydown", function (e) {
		    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
		        cari_barcode(e);
		    }
		});

		function cari_barcode(e) {
			var barcode = e.target.value;
			// console.log(barcode);
			$.ajax({
	        	url : "<?php echo site_url('index.php/invoice/add_item')?>",
	        	type: "POST",
	        	dataType: "JSON",
	        	data: {barcode:barcode, idInvoice:'<?php echo $this->session->userdata('nomor_invoice'); ?>'},
	        	success: function(data){
	        		// view_table();
	        		// console.log(data);
	        		if (data == false) {
	        			$('#barcode').val('');	        			
	        			alert('Data Produk tidak ditemukan');
	        		}else if(data.status == 'habis'){
	        			$('#barcode').val('');	        			
	        			alert('Input Gagal ! Jumlah pembelian melebihi stok yang tersedia');
	        		}else{	        			
	        			view_table();
	        			$('#barcode').val('');
	        		}
	        	},
	            	error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	        	}
	        }); 
		}

		$('.btn-cari').on('click',function(){
			$('#modal-search').modal('show');
		});

		var searchRequest = null;
		var minlength = 2;

	    $("#sample_search").keyup(function () {
	        var that = this,
	        value = $(this).val();
	        // console.log(value);
	        if (value.length >= minlength ) {
	            if (searchRequest != null) 
	                searchRequest.abort();
	            	searchRequest = $.ajax({
	                	type: "POST",
	                	url: "<?php echo base_url('invoice/query_cari') ?>",
	                	data: {
		                    'search_keyword' : value
	                	},
	                	dataType: "JSON",
	                	success: function(data){
	                    //we need to check if the value is the same
	                    	if (value==$(that).val()) {	
	                    	// Receiving the result of search here
	                    		// console.log(data);
		                    	var html = '';
			        	        var i;		        	        
			    	            for(i=0; i<data.length; i++){
			                    	html += '<button type="button" class="list-group-item" onclick="golek(\''+data[i].barcode+'\')">'+data[i].productName+'</button>';                        		                        
			                    }
				                $('.list-search').html(html);
	                    	}
	                	}
	            });
	        }else{
                $('.list-search').html('');	        	
	        }
	    });
			
		$('[name="discount"]').on('keyup', function(){			
			view_table();            
		});

		$('[name="total_bayar"]').on('keyup', function(){			
			view_table();
		});

		$('.btn-checkout').on('click',function(){
			var result = confirm('SIMPAN & CETAK NOTA ?');
			var payment = $('[name="total_bayar"]').val();
			if (payment == "") {
				alert('Masukkan Total Bayar terlebih dahulu !');
			}else{		
				if (result == 1) {
					var idInvoice = '<?php echo $this->session->userdata('nomor_invoice'); ?>';
					var customer = $('[name="customer"]').val();
					var dateInvoice = '<?php echo date('Y-m-d') ?>';
					var totalPrice = $('[name="grand_total"]').val();
					var discount = $('[name="discount"]').val();
					var pay_change = $('[name="kembali"]').val();
					var pay_method = $('[name="payment"]').val();
					var notice = $('[name="notice"]').val();

					$.ajax({
	            		url : "<?php echo site_url('index.php/invoice/confirm_invoice/')?>"+idInvoice,
	        	    	type: "POST",
	    	        	dataType: "JSON",
	    	        	data : {
	    	        		customer: customer,
	    	        		dateInvoice : dateInvoice,
	    	        		totalPrice : totalPrice,
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
								  '<?php echo base_url('invoice/print/') ?>'+idInvoice,
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

	function golek(barcode) {			
        $.ajax({
           url : "<?php echo site_url('index.php/invoice/add_item')?>",
        	type: "POST",
        	dataType: "JSON",
        	data: {barcode:barcode, idInvoice:'<?php echo $this->session->userdata('nomor_invoice'); ?>'},
        	success: function(data){	        		
        		if(data.status == 'habis'){	        			
        			alert('Input Gagal ! Jumlah pembelian melebihi stok yang tersedia');
        		}else{
        			location.reload();
        		}
        	},
            	error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
        	}
        });       
	}

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
