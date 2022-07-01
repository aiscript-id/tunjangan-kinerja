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

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('_nav.php') ;?>
		<!-- sidebar -->
		<?php
		if ($this->session->userdata('id_role') == '1') {
			require_once('_sidebar.php') ;
		} elseif ($this->session->userdata('id_role') == '2') {
			require_once('_sidebar_kepala.php') ;
		} elseif ($this->session->userdata('id_role') == '3') {
			require_once('_sidebar_petugas.php') ;
		} elseif ($this->session->userdata('id_role') == '4') {
			require_once('_sidebar_pegawai.php') ;
		}
		?>
		<!-- content -->
		<div class="content-wrapper px-2">
			<!-- Main content -->
			<div class="content-header">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1><?=$c_des?></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
						<li class="breadcrumb-item active"><?=$c_des?></li>
						</ol>
					</div>
				</div>
			</div>
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
