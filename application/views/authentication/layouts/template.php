<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/uploads/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
	<!-- backgroun image -->
<style>
	.bg-login {
		background-image: url("<?= base_url('assets/images/bg-login.jpg'); ?>");
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		height: 100vh;
		/* bg blur image */
		
		
	}
</style>
</head>

<body class="hold-transition login-page bg-login">
	<!-- <div class="wrapper"> -->
		<?php echo $contents ;?>
	<!-- </div> -->
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
