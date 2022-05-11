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
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/AdminLTE-3.2.0') ?>/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/AdminLTE-3.2.0') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('_header.php') ;?>
		<!-- sidebar -->
		<?php require_once('_sidebar.php') ;?>
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content-header">
				<h1><?=$c_judul?></h1>
				<ol class="breadcrumb">
					<li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active"><?=$c_judul?></li>
				</ol>
			</section>
			<section class="content">
				<?php echo $contents ;?>
			</section>
		</div>
		<!-- footer -->
		<?php require_once('_footer.php') ;?>

		<div class="control-sidebar-bg"></div>
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
