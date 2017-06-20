<link href="<?php echo base_url();?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
*{font-family: Arial;margin:0px;padding:0px;font-size:10pt;}
@page { margin-left:3cm 2cm 2cm 2cm;}
table.table{width:31.4cm ;font-size: 9pt;border-collapse:collapse;}
table.table th{	padding-top:1mm;padding-bottom:1mm;}
table.table	 th{background: #F0F0F0;border-top: 0.2mm solid #000;border-bottom: 0.2mm solid #000;text-align:center;padding-left:0.2cm;border:1px solid #000;}
table tr td{padding-top:0.5mm;padding-bottom:0.5mm;padding-left:2mm;}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td { border-top: 1px solid #ddd; line-height: 1.42857;  padding: 1px; vertical-align: top;}
h1{font-size: 20pt;}
h2{font-size: 16pt;}
h3{font-size: 14pt;}
.profil{display: block;width:31.4cm ;font-size:10px;margin:0px;padding:0px;}
.profil .koperasi{font-size:14px;font-weight:bold;}
.header{display: block;width:31.4cm ;margin-bottom: 0.3cm;text-align: center;}
.footer{display: block;width:31.4cm ;text-align: center;border-top:1px solid #000;}
.attr{font-size:9pt;width: 100%;padding-top:2pt;padding-bottom:2pt;border-top: 0.2mm solid #000;border-bottom: 0.2mm solid #000;}
.pagebreak {width:31.4cm ;page-break-after: always;margin-bottom:10px;}
.akhir {width:31.4cm ;font-size:13px;}
.page {width:31.4cm ;font-size:12px;}
@media print {
  .no-print {	display: none;  }
}
</style>

<body style="padding:10px">
<?php
$total_hal = floor(count($sqlD)/10)+1;
//$row = $sql->row_array();

function myheader($sqlH){
?>
<div class="header">
	<div class="row">
		<div class="col-xs-4" align="left"></div>
		<div class="col-xs-4" align="center"><h4>SURAT TRANSAKSI KELUAR </h4></div>
		<div class="col-xs-4" align="right" style="vertical-text:top;font-size:8pt;"></div>
	</div>
	<div class="row">
		<div class="col-xs-2" align="left">No Trx</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-2" align="left"><?= $sqlH['no_trx_hdr'];?></div>
	</div>
	<div class="row">
		<div class="col-xs-2" align="left">Tanggal</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-2" align="left"><?= tgl($sqlH['tgl_trx_hdr']);?></div>
	</div>
	<div class="row">
		<div class="col-xs-2" align="left">Amnanesa</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-9" align="left"><?= $sqlH['amnanesa'];?></div>
	</div>
	<div class="row">
		<div class="col-xs-2" align="left">Diagnosa</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-9" align="left"><?= $sqlH['diagnosa'];?></div>
	</div>
	<div class="row">
		<div class="col-xs-2" align="left">Karyawan</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-9" align="left"><?= $sqlH['id_karyawan'];?></div>
	</div>
</div>
<table class="table table-striped">
<tr>
	<th>NO</th><th>Obat</th><th>Qty</th><th>Satuan</th><th>Harga</th><th>Jumlah</th>
</tr>    
<?php		
}
function myfooter(){	
	echo "</table>";
?>
<?php
}
	$no=1;
	$page =1;
	foreach($sqlD as $r_data)
	{
		if(($no%10) == 1)
		{
		   	if($no > 1)
		   	{
			        myfooter($row);
				?>
			    <div class="pagebreak" align="right">
					<div class="row">
						<div class="col-xs-4" align="left" style="border:1px solid #000">
							Untuk barang barang yang diperiksa, mohon ditandatangani oleh pemeriksa
						</div>
						<div class="col-xs-2"></div>
						<div class="col-xs-6" align="right">
							Mohon ditandatangani dengan mencantumkan tanggal dan nama jelas.<br/>
							Hal - <?php echo $page."/".$total_hal;?>
							</div>
					</div>	
			    </div>
			    <?php
					$page++;
		  	}
		   	myheader($sqlH);
		}
		?>
	    <tr>
	    	<td align="center"><?= $no;?></td>
	        <td align="left"><?= $r_data->nama_obat;?></td>
	        <td align="center"><?= $r_data->qty;?></td>
	        <td align="center"><?= $r_data->satuan;?></td>
	        <td align="right"><?= rp($r_data->harga);?></td>
	        <?php $ttl = $r_data->qty * $r_data->harga; ?>
	        <td align="right"><?= rp($ttl);?></td>
	    </tr>    
	    <?php
		$no++;
	}
myfooter();	
	echo "</table>";
	echo "<br>";
	$totalall=0;
	foreach($sqlD as $r_data)
	{
	    $totalall += $ttl = $r_data->qty * $r_data->harga;
	}
?>
<div class="footer">
	<div class="row" style="padding-top:2px;">
		<div class="col-xs-2 col-xs-offset-6" align="left">Total</div>
		<div class="col-xs-1" align="center">:</div>
		<div class="col-xs-3" align="right"><?= rp($totalall);?></div>		
		<div class="col-xs-1" align="center"></div>
	</div>
	<div class="row" style="padding-top:2px;">
		<div class="col-xs-5" align="left"></div>
		<div class="col-xs-2" align="center" style="border:1px solid #000">Disetujui Oleh,<br/><br/><br/><br/></div>
		<div class="col-xs-3"></div>
		<div class="col-xs-2" align="center" style="border:1px solid #000">Dibuat Oleh,<br/><br/><br/></div>
	</div>
</div>	
<div class="pagebreak" align="right">
	<div class="row" style="padding-left:5px">
		<div class="col-xs-6" align="left">
		Mohon ditandatangani dengan mencantumkan tanggal dan nama jelas.
		</div>
		<div class="col-xs-4">
			<p align="right" class="no-print">
				<a onClick="window.print();" class="btn btn-outline btn-info"><i class="fa  fa-print"></i> Print</a>
			</p>				
		</div>
		<div class="col-xs-2" align="right">
			Hal - <?php echo $page."/".$total_hal;?>
			</div>
	</div>	
</div>

