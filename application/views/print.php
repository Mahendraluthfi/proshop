<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Nota</title>
	<style>
		body{			
    		font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;    		
		}
		@page {
	       size: 8.27in 5.5in;
	       margin: 3mm 3mm 3mm 3mm;	       
	    }	    
	</style>
</head>
<body>
	<center><span style="font-size: 14px; font-weight: bold;"></span>NOTA PEMBELIAN</center><br>
	<table border="0" width="100%" style="font-size: 11px; outline:dotted 1px;">
		<tr>
			<td rowspan="4" width="1%"><img src="<?php echo base_url('asset/logonota.png') ?>" height="50" alt=""></td>
			<td>
				<b>PROSHOP PADANG GOLF ADISUCIPTO</b>
			</td>
			<td width="8%">Tanggal</td>
			<td>: <?php echo date('d-m-Y', strtotime($invoice->dateInvoice));  ?></td>
		</tr>
		<tr>
			<!-- <td></td> -->
			<td>Alamat: Lanud Adisutjipto Yogyakarta Jl. Raya Solo km.10, 2, Maguwoharjo</td>
			<td>Nota No.</td>
			<td>: <?php echo $invoice->idInvoice ?></td>
		</tr>
		<tr>
			<!-- <td></td> -->
			<td>Telepon: (0274) 4331681</td>
			<td>Customer</td>
			<td>: <?php echo $invoice->customer ?></td>
		</tr>
		<tr>
			<!-- <td></td> -->
			<td></td>
			<td>Kasir</td>
			<td>: <?php echo $invoice->kasir ?></td>
		</tr>
	</table><p></p>
	<table border="0" cellpadding="3" cellspacing="3" style="border-collapse: collapse; font-size: 13px;" width="100%">
		<tr align="center" style="border-bottom: dotted 1px;">
			<th width="1%">No</th>
			<th align="left">Nama Barang</th>
			<th width="1%">Jumlah</th>
			<th align="right">Harga</th>
			<th align="right">Subtotal</th>
		</tr>
		<?php $no=1; foreach ($det as $data) { ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data->productName ?></td>
				<td align="center"><?php echo $data->qty ?></td>
				<td align="right"><?php echo number_format($data->priceIn) ?></td>
				<td align="right"><?php echo number_format($data->subtotal) ?></td>
			</tr>
		<?php } ?>
		<tr style="border-top: dotted 1px;">
			<td></td>
			<td>Pembayaran : <?php echo $invoice->pay_method ?></td>
			<td></td>
			<th align="right">Subtotal</th>
			<td align="right"><?php echo number_format($invoice->totalPrice) ?></td>
		</tr>
		<tr>
			<td></td>
			<td>Note : <?php echo $invoice->notice ?></td>
			<td></td>
			<th align="right">Diskon</th>
			<td align="right"><?php echo number_format($invoice->discount) ?></td>
		</tr>
		<tr>
			<td rowspan="3" colspan="3">
				<table border="0" width="100%">
					<tr align="center">
						<td width="50%">
							Kasir<br><br><br><br>
							<?php echo $invoice->kasir ?>
						</td>
						<td>
							Tanda Terima <br><br><br><br>
							.........
						</td>
					</tr>
				</table>
			</td>			
			<th align="right">Total</th>
			<td align="right" style="border-bottom: dotted 1px;"><?php echo number_format($invoice->totalPrice - $invoice->discount) ?></td>
		</tr>
		<tr>		
			<th align="right">Total Bayar</th>
			<td align="right"><?php echo number_format($invoice->payment) ?></td>
		</tr>
		<tr>		
			<th align="right">Kembali</th>
			<td align="right"><?php echo number_format($invoice->pay_change) ?></td>
		</tr>
	</table>
<script>
	window.print();
</script>
</body>
</html>

