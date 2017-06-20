    <!-- DATA TABLES -->
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
	<form method="post" action="<?php echo base_url()."obat/rubah" ?>">
<?php foreach($single_depart as $isi): ?>
		<!-- begin form -->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->

			<input type="hidden" name="did" value="<?php echo $isi->idobat; ?>">
								<div class="form-group">
								<label>Nama Barang</label>
								<?= form_error('nama_obat');?>
								<input class="form-control" type="text" name="nama_obat" placeholder="Masukkan Nama Barang" data-rule-required="true" value="<?php echo $isi->nama_obat;?>">
								</div>

								<div class="form-group">
								<label>Satuan</label>
								<?= form_error('satuan');?>
								<input class="form-control" type="text" name="satuan" placeholder="Masukkan Satuan" data-rule-required="true" value="<?php echo $isi->satuan;?>">
								</div>


								<div class="form-group">
								<label>Harga</label>
								<?= form_error('harga');?>
								<input class="form-control" type="number" name="harga" placeholder="Masukkan Harga" data-rule-required="true" value="<?php echo $isi->harga;?>">
								</div>


								<div class="form-group">
								<label>Stock Awal</label>
								<?= form_error('stock_awal');?>
								<input class="form-control" type="number" name="stock_awal" placeholder="Masukkan Nama Obat" data-rule-required="true" value="<?php echo $isi->stock_awal;?>">
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
<script type="text/javascript">
$(document).ready(function() {
	$('#validate').validate({
		rules: 
			{
				username: "required ",
				<?php if($act=='add') echo 'password: "required",'; ?>
				cpassword: {
					equalTo: "#password"
				}
			},
        errorClass: 'help-block col-xs-12',
		errorElement: 'span',
		highlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
		}
	});
	});
</script>
      
 </body>
</html>

