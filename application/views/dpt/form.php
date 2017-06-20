    <!-- DATA TABLES -->
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
			<?= form_open('obat/'.$tujuan,'id="validate"');?>  <!-- begin form -->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->
								<div class="form-group">
							<label for="username">nama departement </label>
							<?= form_error('nama');?>
								<input id="username" type="text" class="form-control" name="nama" placeholder="Enter Nama departement" data-rule-required="true" >
								</div> 
							<br>
								<div class="es">
					<button class="btn btn-primary" type="submit"onclick="return confirm('Yakin dengan data ini?');">Submit</button>
									</div></br>
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
