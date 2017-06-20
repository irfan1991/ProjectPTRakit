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


<!--
			diganti sama form_open(). bisa dilihat di user_guide form_helper.
			<form method="post" action="">
-->
			<?= form_open('obat/'.$tujuan,'id="validate"');?>  <!-- begin form -->
			<!-- ini <form action="http://localhost/rakit/index.php/obat/simpan" method="post" accept-charset="utf-8">  bisa di cek di view source pada firefox-->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->
				<div class="form-group">
					<label for="username">nama barang </label>
					<input id="username" type="text" class="form-control" name="nama_obat" placeholder="Enter Nama Obat" data-rule-required="true" value="<?= $sql['nama_obat'];?>">
				</div>
				<div class="form-group">
					<label for="username">satuan</label>
					<input id="username" type="text" class="form-control" name="satuan" placeholder="Enter Satuan" data-rule-required="true" value="<?= $sql['satuan'];?>">
				</div>	
				<div class="form-group">
					<label for="username">harga</label>
					<input id="username" type="number" class="form-control" name="harga" placeholder="Enter harga" data-rule-required="true" data-rule-number="true" value="<?= $sql['harga'];?>">
				</div>
				<div class="form-group">
					<label for="username">stok awal</label>
					<input id="username" type="number" class="form-control" name="stock_awal" placeholder="Enter stok awal"  data-rule-number="true" value="<?= $sql['stock_awal']; ?>">
				</div>	
				<br>
				<div class="es">
					<button class="btn btn-primary" type="submit"onclick="return confirm('Yakin dengan data ini?');">Submit</button>
				</div>
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
