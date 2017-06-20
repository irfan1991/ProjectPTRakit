<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminKlinik| Dashboard</title>
<?php
$meta = array(
		array('name' => 'robots', 'content' => 'no-cache'),
		array('name' => 'description', 'content' => 'Aplikasi DII'),
//		array('name' => 'keywords', 'content' => 'Pelayanan Pancoran Mas'),
		array('name' => 'Template', 'content' => 'AdminLTE 2'),
		array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'),
		array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	);
echo meta($meta);	
?>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>media/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url();?>media/css/ionicons/ionicons.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link href="<?php echo base_url();?>media/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php echo base_url();?>media/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>media/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>media/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
