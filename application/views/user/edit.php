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
	<form method="post" action="<?php echo base_url()."user/rubah" ?>">
<?php foreach($single_user as $isi): ?>
		<!-- begin form -->
			<div class="row"> <!-- begin row -->
			<div class="col-md-4">	<!-- begin col -->

			<input type="hidden" id="hidden" name="did" value="<?php echo $isi->iduser; ?>">
								<div class="form-group">
								<label>Username</label>
								<?= form_error('username');?>
								<input class="form-control" type="text" name="username" placeholder="Enter username" data-rule-required="true" value="<?php echo $isi->username;?>">
								</div>
								<div class="form-group">
								<label>Email</label>
								<?= form_error('email');?>
								<input class="form-control" type="text" name="email" placeholder="Enter email" data-rule-required="true" value="<?php echo $isi->email;?>">
								</div>
								<div class="form-group">
							<label for="role" >Hak Akses</label><br>
							<?= form_error('role');?>
								<select  name="role" id="role">
       					 <option value="0">Non Administrator</option>
       				  <option value="1">Administrator</option>
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

