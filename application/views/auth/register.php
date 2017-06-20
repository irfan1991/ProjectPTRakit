<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="<?php echo base_url(); ?>media/css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="<?php echo base_url();?>media/css/font-awesome/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>media/css/style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Sistem Informasi Klinik</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5>DAFTAR SEBAGAI OPERATOR BARU </h5>
					<form class="" method="post" action="#">
				
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<?= form_error('username');?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <?= form_error('email');?>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<?= form_error('password');?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<?= form_error('confirm');?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
							

							<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Status</label>
							<?= form_error('status');?>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<select class="form-control input-sm" name="status" id="status">
       
       					 <option value="0">Petugas Non Aktif</option>
       					  <option value="1">Petugas Aktif</option>
       
       
								</select>
								</div>
							</div>
						</div>
						
								

						<div class="form-group ">
							<BUTTON id="button" class="btn btn-primary btn-lg btn-block login-button">Register</BUTTON> 
						</div>
						
					</form>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>media/js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>media/js/bootstrap.min.js"></script>
     <script src="<?php echo base_url(); ?>media/js/plugins/form/jquery.validate.js"></script>
	</body>
</html>

