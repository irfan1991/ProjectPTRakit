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
			
			<?= form_open("karyawan/".$tujuan,'id="validate"');?>
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->

			<input type="hidden" name="user_c" value="<?php echo $username;  ?>">
				<div class="form-group">
					<label for="username">nik</label>
					<input id="username" name="nik" class="form-control" type="text" placeholder="Enter NIK" data-rule-required="true" value="<?= $sql['nik'];?>">
				</div>
				<div class="form-group">
					<label for="username">No MR</label>
					<input id="notrx" name="nomr" class="form-control" type="text" placeholder="Enter NO Rekam Medik" data-rule-required="true" readonly="true" value="<?= $kodeunik; ?>">
				</div>
				<div class="form-group">
					<label for="username">nama karyawan</label>
					<input id="username" name="nama" class="form-control" type="text" placeholder="Enter nama" data-rule-required="true" value="<?= $sql['namakar'];?>">
				</div>
				<div class="form-group">
					<label>Tanggal lahir:</label>
					<input class="form-control" type="text" name="tanggal" name="tanggal" id="tanggal" placeholder="yyyy-mm-dd" value="<?= $sql['tgllahir'];?>">
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
       					 <option value="0">Aktif</option>
       				     <option value="1">Non Aktif</option>
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
				<br>
				<div class="es">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
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
