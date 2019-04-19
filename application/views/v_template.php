<!doctype html>
<html lang="en">

<head>
	<title><?= $judul ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.button.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">

	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/pln1.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/pln1.png">

	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- DataTable -->
	<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" >
			<div class="brand">
				<a href="i<?=base_url()?>dashboard"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo"
						width="100px;" style="margin-top:-10px!important;" class="logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i
							class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url()?>assets/img/user.png"
									class="img-circle" alt="Avatar">
								 <span>
									  <?php if($this->session->userdata('id_level')!= null): ?>
										<?= $this->session->userdata('nama_admin') ?>
										<?php else: ?>
										<?= $this->session->userdata('nama_pelanggan') ?>
									  <?php endif ?>
								 </span>
								 <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<?php if($this->session->userdata('id_level')!=NULL): ?>
								<li><a href="<?=base_url()?>admin/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							  <?php else: ?>
								<li><a href="<?=base_url()?>user/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							  <?php endif ?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">

						<?php if($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level')== 1): ?>
						<li>
							<a href="<?=base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>data_admin" class=""><i class="fa fa-address-book"></i><span>Data Admin</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>level" class=""><i class="fa fa-address-card"></i> <span>Data Level</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>data_pelanggan" class=""><i class="fa fa-user"></i> <span>Data Pelanggan</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>tarif" class=""><i class="fa fa-dollar"></i> <span>Tarif Listrik</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>penggunaan" class=""><i class="fa fa-line-chart"></i> <span>Penggunaan Listrik</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>pembayaran" class=""><i class="fa fa-money"></i> <span>Konfirmasi Pembayaran</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>riwayat" class=""><i class="fa fa-history"></i> <span>Riwayat Pembayaran</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>laporan_pembayaran" class=""><i class="fa fa-download"></i> <span>Generate Laporan</span></a>
						</li>

					<?php elseif($this->session->userdata('id_level')!= NULL && $this->session->userdata('id_level')== 2): ?>

						<li>
							<a href="<?=base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
						</li>

						<li>
							<a href="<?=base_url()?>laporan_pembayaran" class=""><i class="fa fa-download"></i> <span>Generate Laporan</span></a>
						</li>

					<?php else: ?>
						<li>
							<a href="<?=base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
						</li>
						<li>
							<a href="<?=base_url()?>tagihan" class=""><i class="fa fa-line-chart"></i> <span>Tagihan Listrik</span></a>
						</li>
						<li>
							<a href="<?=base_url()?>laporan_tagihan" class=""><i class="fa fa-download"></i> <span>Generate Laporan</span></a>
						</li>
					<?php endif ?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<?php $this->load->view($konten); ?>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->>
	<script src="<?=base_url()?>assets/scripts/klorofil-common.js"></script>

	<script>
	$(function () {
		$('#tabelbiasa').DataTable()
	})
	</script>

</body>

</html>
