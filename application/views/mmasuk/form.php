    <!-- Bootstrap Dialog -->
    <link href="<?php echo base_url();?>media/css/plugins/chosen/chosen.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>media/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul;?>
            <small>Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active"><?= $judul;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
			<?= form_open("transaksiM/".$tujuan,'id="validate"');?>
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->
				<input type="hidden" name="user_c" value="<?php echo $username;  ?>">
				<div class="form-group">
					<label for="username">No Trx Masuk</label>
					<input id="notrx" name="notrx" class="form-control" type="text" placeholder="Enter NO TRX" data-rule-required="true" readonly="true" value="<?= $kodeunik; ?>">
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input class="form-control" type="text" name="tanggal" id="tanggal" placeholder="yyyy-mm-dd" data-rule-required="true">
				</div>
			<!-- begin col 	<div class="form-group">
				    <label>Nama Karyawan</label>
				    <?php
					//	echo form_dropdown('kary',$kary,false,'id="" class="form-control chosen" data-placeholder="-- Pilih Karyawan --"');
				    ?>
				</div>-->
				<br>
			</div>	<!-- begin col -->
			</div>	<!-- end row -->
			<table class="table table-hover" id="dataobat">
				<thead>
					<tr>
						<th>Nama Obat</th>
						<th>Qty</th>
						<th>Satuan</th>
						<th><i class="glyphicon glyphicon-trash"></i></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			<a class="btn btn-success" onClick="tambah()"><i class="glyphicon glyphicon-plus"></i> Tambah Baris</a>
			<br/>
			<p align="center">
				<button class="btn btn-primary" type="submit">Submit</button>
			</p>

			</form>	<!-- end form -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
	</div><!-- ./wrapper -->
	
<?php $this->load->view('layout/jscript');?>

<script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/plugins/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
var obat; var satuanObat = new Array();	var jumlahObat = new Array();	
$(document).ready(function() {
	obat = <?= json_encode($obat);?>;
	$('.chosen').chosen();
	$('#validate').validate({
        errorClass: 'help-block col-xs-12',
		errorElement: 'span',
		highlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
		}
	});
	
	$('#tanggal').datepicker({
		format: "yyyy-mm-dd",
		language: 'id',
		});
	});
	
	$.fn.datepicker.dates['id']={days:["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],daysShort:["Ming","Sen","Sel","Rab","Kam","Jum","Sab"],daysMin:["Mi","Sen","Sel","Ra","Ka","Ju","Sa"],months:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],monthsShort:["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],today:"Hari ini",clear:"Clear"};
	
	function tambah()
	{
		var tbl = $('#dataobat');
		var lastRow = tbl.find("tr").length;
		var idlast = lastRow -1;
		var emptyrows = 0;
		for (i=idlast; i<lastRow; i++) {
			if ($("#idobat"+i).val() == '' || $("#qty"+i).val() == '' || $("#harga"+i).val() == '') {
				emptyrows += 1;
			}
		}
			
		if (emptyrows == 0 ) {
			var opt = '';//'<option value=""></option>';
			$.each(obat, function() {
				opt += '<option value="' + this.idobat + '">'+this.nama_obat+'</option>';
				satuanObat[this.idobat] = this.satuan;
				jumlahObat[this.idobat] = this.stock_akhir;
				
			});		
			
			var ddlObat = '<select name="idobat[]" id="idobat'+lastRow+'" class="form-control idobat chosenMat'+lastRow+'" data-placeholder="-Pilih Obat-">'+opt+'</select>';
			var txtJml = '<input type="text" name="qty[]" class="form-control qty" id="qty'+lastRow+'" data-rule-required="true" data-rule-number="true"/>';
			var txtSat = '<input type="text" name="sat[]" class="form-control sat" id="sat'+lastRow+'" readonly />';
			var trash = '<i class="glyphicon glyphicon-trash" onClick="hapus('+lastRow+')"></i>';
			tbl.append("<tr id='tr"+lastRow+"'><td>"+ddlObat+"</td><td align='right'>"+txtJml+"</td><td>"+txtSat+"</td><td><center>"+trash+"</center></td></tr>");
		} else {
			BootstrapDialog.alert("<h4>Silahkan mengisi data pada baris yang tersedia terlebih dahulu, sebelum menambah baris.</h4>");
		}
		$('.chosenMat'+lastRow).chosen({width: "100%"});
		$('#sat'+lastRow).val(satuanObat[$("#idobat"+lastRow).val()]);
		$('#qty'+lastRow).val("Stok Sekarang => " + jumlahObat[$("#idobat"+lastRow).val()]);			
	}

	function hapus(id){
		$('#dataobat #tr'+id).remove();
	}	
	$(function(){
		$("#dataobat").on('change','.idobat',function(){
			var satuannya = $(this).parent().next().next().find('.sat');
			
			$(satuannya).val(satuanObat[$(this).val()]);
		});
		$("#dataobat").on('change','.idobat',function(){
			var jumlahnya = $(this).parent().next().find('.qty');
			var satuannya = $(this).parent().next().next().find('.sat');
			
			$(jumlahnya).val("Stok Sekarang => " + jumlahObat[$(this).val()]);
			$(satuannya).val(satuanObat[$(this).val()]);
			
			
		});
	});
	
</script>

      
 </body>
</html>
