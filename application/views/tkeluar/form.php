    <!-- Bootstrap Dialog -->
    <link href="<?php echo base_url();?>media/css/plugins/chosen/chosen.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>media/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url();?>media/css/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    
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
			
			<?= form_open("transaksiK/".$tujuan,'id="validate"');?>
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->
				<input type="hidden" name="user_c" value="<?php echo $username;  ?>">
				<div class="form-group">
					<label for="username">No Trx Keluar</label>
					<input id="notrx" name="notrx" class="form-control" type="text" placeholder="Enter NO TRX" data-rule-required="true" readonly="true" value="<?= $kodeunik; ?>">
				</div>
				<div class="form-group">
					<label>Tanggal</label>
					<input class="form-control" type="text" name="tanggal" id="tanggal" placeholder="yyyy-mm-dd" data-rule-required="true">
				</div>
				<div class="form-group">
					<label>Amnanesa</label>
					<input class="form-control" type="text" name="amnanesa" id="amnanesa" placeholder="Max 100 Karakter" data-rule-required="true">
				</div>
				<div class="form-group">
					<label>Diagnosa</label>
					<input class="form-control" type="text" name="diagnosa" id="diagnosa" placeholder="Max 100 Karakter" data-rule-required="true">
				</div>
				<div class="form-group">
				    <label>Nama Karyawan</label>
				    <?php
						echo form_dropdown('kary',$kary,false,'id="" class="form-control chosen" data-placeholder="-- Pilih Karyawan --"');
				    ?>
				</div>

					<div class="form-group">
							<label for="status" >Status</label><br>
							<?= form_error('status');?>
								<select  name="status">
       					 <option value="0">Kecelakaan </option>
       				  <option value="1">Non Kecelakaan</option>
          						</select>
								</div>

				<br>
			</div>	<!-- begin col -->
			</div>	<!-- end row -->
			<table class="table table-hover" id="dataobat">
				<thead>
					<tr>
						<th>Nama Obat</th>
						<th>Qty</th>
						<th>Satuan</th>
						<th>Harga</th>
						<th>Total</th>
						<th><i class="glyphicon glyphicon-trash"></i></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			<table class="table" id="totalobat">
				<thead>
					<tr>
						<th width="70%">Total</th>
						<th><input type="text" class="form-control totalall" id="totalall" readonly="true"></th>
					</tr>
				</thead>
			<table>


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
<script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
  function printAction(x)
  {
	  window.open("<?= site_url();?>/transaksiK/preview/"+x, "_blank", "scrollbars=yes, resizable=yes, top=75, left=250, width=900, height=600");
  }

  function editAction(x)
  {
	  window.location.href = "<?= site_url();?>/transaksiK/ubah/"+x;
  }

  function deleteAction(x)
  {
	BootstrapDialog.confirm('<center><h4>Yakin ingin hapus data ini ?</h4></center>', function(result){
		if(result) {
			$.post('<?= site_url();?>/transaksiK/hapus',{id : x} ,
				function(e)
				{
					var r = e.split('#');
					if(r[0] == 'S')
					{
						window.location.reload();
					}
					else
					{
						BootstrapDialog.alert('<center><h4>Maaf, tidak bisa dihapus</h4></center>');
					}
				}
			);
		}
	});
  }
</script>
<script type="text/javascript">
var obat; var hargaObat = new Array();var satuanObat = new Array();	var jumlahObat = new Array();	
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
				jumlahObat[this.idobat] = this.stock_akhir;
				satuanObat[this.idobat] = this.satuan;
				hargaObat[this.idobat] = this.harga;
				
			});		
			
			var ddlObat = '<select name="idobat[]" id="idobat'+lastRow+'" class="form-control idobat chosenMat'+lastRow+'" data-placeholder="-Pilih Obat-">'+opt+'</select>';
			var txtJml = '<input type="text" name="qty[]" class="form-control qty" id="qty'+lastRow+'" data-rule-required="true" data-rule-number="true"/>';
			var txtSat = '<input type="text" name="sat[]" class="form-control sat" id="sat'+lastRow+'" readonly />';
			var txtHrg = '<input type="text" name="harga[]" class="form-control harga" id="harga'+lastRow+'" readonly data-rule-required="true" data-rule-number="true" />';
			var txtTotal = '<input type="text" name="total[]" class="form-control total" id="total'+lastRow+'"  />';
			var trash = '<i class="glyphicon glyphicon-trash" onClick="hapus('+lastRow+')"></i>';
			tbl.append("<tr id='tr"+lastRow+"'><td>"+ddlObat+"</td><td align='right'>"+txtJml+"</td><td>"+txtSat+"</td><td align='right'>"+txtHrg+"</td><td align='right'>"+txtTotal+"</td><td><center>"+trash+"</center></td></tr>");
		} else {
			BootstrapDialog.alert("<h4>Silahkan mengisi data pada baris yang tersedia terlebih dahulu, sebelum menambah baris.</h4>");
		}
		$('.chosenMat'+lastRow).chosen({width: "100%"});
		
		 $('#qty'+lastRow).val("Sisa Stok " + jumlahObat[$("#idobat"+lastRow).val()]);	
		$('#sat'+lastRow).val(satuanObat[$("#idobat"+lastRow).val()]);		
		$('#harga'+lastRow).val(hargaObat[$("#idobat"+lastRow).val()]);		
	}




	function hapus(id){
		$('#dataobat #tr'+id).remove();
	}
	
	function calculateTableSum() {
		var sum = 0;
		$('#dataobat input.total').each(function() {
			//add only if the value is number
			if(this.value !='') {
				//sum += parseFloat(this.value);
				sum += parseInt(this.value.replace(/[\,]/g, ''));
			}
		});
		$('#totalobat input.totalall').val(sum);	
/*		$.post('<?= site_url();?>/transaksi/bilang.php',{dapat: sum },
			function(e){ $('#bilang').html(e); }
		);*/
	}
	$(document).on('keyup', 'input.total', calculateTableSum);
	
	$(function(){
		$("#dataobat").on('change','.idobat',function(){
			var jumlahnya = $(this).parent().next().find('.qty');
			var satuannya = $(this).parent().next().next().find('.sat');
			var harganya = $(this).parent().next().next().next().find('.harga');
			
			 $(jumlahnya).val("Sisa Stok " + jumlahObat[$(this).val()]);
			$(satuannya).val(satuanObat[$(this).val()]);
			$(harganya).val(hargaObat[$(this).val()]);
			
		});

		$("#dataobat").on('keyup','.qty',function(){
			var harganya = $(this).parent().next().next().find('.harga');
			var obat = $(this).parent().next().next().find('.obat');
			var subtotalnya = $(this).parent().next().next().next().find('.total');
			
			var hsl1 = $(this).val()*$(harganya).val().replace(/[\,]/g, '');
			var hsl2 = $(this).val()-$(this).val().replace(/[\,]/g, '');
			$(subtotalnya).val(hsl1);
				var sum = parseInt(hsl2);
		$('#dataobat input.total').each(function() {
			//add only if the value is number
			if(this.value !='') {
				//sum += parseFloat(this.value);
				sum += parseInt(this.value.replace(/[\,]/g, ''));
			}
		});
		$('#totalobat input.totalall').val(sum);	
		});

		$("#dataobat").on('keyup','.harga',function(){
			var qtynya = $(this).parent().prev().prev().find('.qty');
			var subtotalnya = $(this).parent().next().find('.total');
			
			var hsl1 = $(this).val()*$(qtynya).val();
			var hsl2 = $(this).val()-$(this).val().replace(/[\,]/g, '');
			$(subtotalnya).val(hsl1);



		});
	});
</script>

      
 </body>
</html>
