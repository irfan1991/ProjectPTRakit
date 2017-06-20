 <!-- DATA TABLES -->
   <link href="<?php echo base_url();?>media/css/plugins/chosen/chosen.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>media/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul;?>
            <small>Edit Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active"><?= $judul;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  
        <?=$this->session->flashdata('pesan')?>
	<form method="post" action="<?php echo base_url()."karyawan/rubah" ?>">
<?php foreach($single_depart as $isi): ?>
		<!-- begin form -->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->
			<input type="hidden" id="hidden" name="did" value="<?php echo $isi->id_kary; ?>">
			<input type="hidden" name="user_u" value="<?php echo $username;  ?>">
				<div class="form-group">
				<label>NIK</label>
				<?= form_error('nik');?>
				<input class="form-control" type="text" name="nik" placeholder="Enter NIK" data-rule-required="true" value="<?php echo $isi->nik;?>">
				</div>
				<div class="form-group">
					<label for="username">No MR</label>
					<input id="notrx" name="nomr" class="form-control" type="text" data-rule-required="true" readonly="true" value="<?php echo $isi->no_mr ?>">
				</div>
				<div class="form-group">
				<label>Nama Karyawan</label>
				<?= form_error('nama');?>
				<input class="form-control" type="text" name="namakar" placeholder="Enter Nama Karyawan" data-rule-required="true" value="<?php echo $isi->namakar;?>">
				</div>
														
				<div class="form-group">
				<label>Tanggal Lahir : </label>
				<?= form_error('tanggal');?>
				<input class="form-control" type="text" name="tanggal" placeholder="Enter NIK" data-rule-required="true" id="tanggal" placeholder="yyyy-mm-dd" value="<?php echo $isi->tgllahir;?>">
				</div>


				<div class="form-group">
				    <label>Departement</label>
				    <?php
						$selected = $sql['dpmnt'];
						echo form_dropdown('depart',$depart,$selected,'id="" class="form-control chosen" data-placeholder="-- Pilih Departemen --"');
				    ?>
				</div>

				<div class="form-group">
							<label for="status" >Status</label><br>
							<?= form_error('status');?>
								<select  name="status" id="role">
       					<?php	if($isi->status == 0){ ?>
						<option value ="0" selected=>Aktif </option>
       				  <option value="1">Non Aktif</option>
							<?php	}else{ ?>
						 <option value="1" selected>Non Aktif</option>
						<option value="0">Aktif </option>
       				 			<?php				} ?>
          						</select>
								</div>
				<div class="form-group">
							<label for="status" >Jenis Kelamin</label><br>
							<?= form_error('jk');?>
								<select  name="jk" id="role">
       					 <option value="0">L</option>
						 <option value="1">P</option>
          						</select>
								</div>				
																
							</div>
						</div>
							
			<br><br>
				<div class="es">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div></br>
				<?php endforeach; ?>
			</div>	<!-- begin col -->
			</div>	<!-- end row -->
			</form>	<!-- end form -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	</div><!-- ./wrapper -->
      
      <?php $this->load->view('layout/jscript');?>
<script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/plugins/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
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
</script>
      
 </body>
</html>
