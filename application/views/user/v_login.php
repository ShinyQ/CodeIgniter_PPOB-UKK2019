<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Pelanggan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/pln1.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/pln1.png">

	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

  <style>
  .label-text{
    font-size: 14px;
  }

  input[type="checkbox"], input[type="radio"]{
  	position: absolute;
  	right: 9000px;
  }

  /*Check box*/
  input[type="checkbox"] + .label-text:before{
  	content: "\f096";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 5px;
  }

  input[type="checkbox"]:checked + .label-text:before{
  	content: "\f14a";
  	color: #2980b9;
  	animation: effect 250ms ease-in;
  }

  input[type="checkbox"]:disabled + .label-text{
  	color: #aaa;
  }

  input[type="checkbox"]:disabled + .label-text:before{
  	content: "\f0c8";
  	color: #ccc;
  }

  /*Radio box*/

  input[type="radio"] + .label-text:before{
  	content: "\f10c";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 5px;
  }

  input[type="radio"]:checked + .label-text:before{
  	content: "\f192";
  	color: #8e44ad;
  	animation: effect 250ms ease-in;
  }

  input[type="radio"]:disabled + .label-text{
  	color: #aaa;
  }

  input[type="radio"]:disabled + .label-text:before{
  	content: "\f111";
  	color: #ccc;
  }

  /*Radio Toggle*/

  .toggle input[type="radio"] + .label-text:before{
  	content: "\f204";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 10px;
  }

  .toggle input[type="radio"]:checked + .label-text:before{
  	content: "\f205";
  	color: #16a085;
  	animation: effect 250ms ease-in;
  }

  .toggle input[type="radio"]:disabled + .label-text{
  	color: #aaa;
  }

  .toggle input[type="radio"]:disabled + .label-text:before{
  	content: "\f204";
  	color: #ccc;
  }


  @keyframes effect{
  	0%{transform: scale(0);}
  	25%{transform: scale(1.3);}
  	75%{transform: scale(1.4);}
  	100%{transform: scale(1);}
  }
  </style>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo" width="150px;"></div>
								<p class="lead">Login Ke Akun Anda</p>
							</div>

              <center><font color="red" size="3"><b><?= $this->session->flashdata('pesan_gagal'); ?></font><font color="green" size="3"><?= $this->session->flashdata('pesan_sukses'); ?></font></b></center><br />
							<form class="form-auth-small" action="<?=base_url('user/proses_login')?>" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input id="sp" type="password" name="password" class="form-control" placeholder="Password">
								</div>

                  <label style="float:left!important;">
                    <input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span class="label-text">Lihat Password</span>
                  </label><br />

								<input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Login Akun">
							</form><br />
							<p>Belum Punya Akun ? <a data-toggle="modal" data-target="#register" href="">Daftar Disini</a></p>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Pelanggan | PPOB Listrik</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Registrasi Pengguna -->
				<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4><strong>Registrasi Akun</strong></h4>
						</div>
						<div class="modal-body">
							<br />

							<form action="<?=base_url('user/register')?>" method="post" class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama_pelanggan" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat :
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kwh : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="number" name="nomor_kwh" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Tarif : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
                            <select  class="form-control col-md-7 col-xs-12" name="id_tarif" required="required">
                                <option>Pilih Tarif</option>
                                  <?php foreach ($DataTarif as $data) {  ?>
                                      <option value="<?=$data->id_tarif?>"><?= $data->nama_tarif ?></option>
                                  <?php } ?>
                            </select>
									</div>
								</div>

								<div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

                <div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password : </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" id="sp1" name="password" required="required" class="form-control col-md-7 col-xs-12">
									</div>
								</div>

                <div class="form-group">
									<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									<label>
											<input type="checkbox" name="check" type="checkbox" onclick="FPassword1()"> <span class="label-text">Lihat Password</span>
									</label>
									</div>
								</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
						</div>
					</div>
					</form>
				</div>
			  </div>
	<!-- END WRAPPER -->
  <script>
  function FPassword() {
    var x = document.getElementById("sp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
  }

	function FPassword1() {
    var x = document.getElementById("sp1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
  }
 </script>
</body>

</html>
