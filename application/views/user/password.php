    <!-- DATA TABLES -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul;?>
            <small>Add Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active"><?= $judul;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  
        <p><?=$this->session->flashdata('pesan')?></p>
	<?php echo form_open_multipart('user/save_password'); ?>
		<!-- begin form -->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->

			<div class="form-group">
			<label>Old Password</label>
			<?= form_error('xpassword');?>
			<input class="form-control" type="password" name="xpassword" placeholder="Enter old Password" data-rule-required="true" value="<?= set_value('xpassword')?>">
			</div>
				
			<div class="form-group">
			<label>New Password</label>
			<?= form_error('password');?>
			<input id="password" class="form-control" type="password" name="password" placeholder="Enter New Password">
			</div>
			
			<div class="form-group">
			<label for="username">ulangin password</label>
			<?= form_error('cpassword');?>
			<input id="cpassword" class="form-control" type="password" name="cpassword" placeholder="Enter Password again ">
			</div>

							</div>
						</div>
							
			<br><br>
				<div class="es">
					<button class="btn btn-primary" type="submit">Submit</button>
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

