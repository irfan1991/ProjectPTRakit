<?php $this->load->view('layout/header');?>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>Klinik</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
<?php
// menampilkan pesan saat tambah,ubah,hapus

?>		  
        <p class="login-box-msg">Sign in to start your session</p>
       <?= form_open('login/login_exec', 'id="valida"')?>
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" data-rule-required="true"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"  data-rule-required="true"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <?php
          if ($this->session->flashdata('pesan') <> '') {
        ?>
            <div class="alert alert-dismissible alert-danger">
              <?php echo $this->session->flashdata('pesan');  ?>
            </div>

        <?php  
          }
        ?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<link rel="stylesheet" href="<?php echo base_url();?>media/css/style.css">
    <!-- jQuery 2.1.3 -->
<script src="<?php echo base_url();?>media/js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url();?>media/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#valida').validate({
        errorClass: 'help-block col-xs-4',
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
