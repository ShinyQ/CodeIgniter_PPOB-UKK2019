<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
		<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
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
</head>

<body>
	<?php
		if($this->session->flashdata('pesan_sukses') !=''){
	?>
				<script>
				$(document).ready(function(){
						$("#pesan").modal();
				});
				</script>
	<?php
		}
	?>
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
								<div class="logo text-center"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo" width="120"></div>
								<p class="lead">Login Ke Akun Anda</p>
							</div>

              <center><font color="red" size="3"><b><?= $this->session->flashdata('pesan_gagal'); ?></font><font color="green" size="3"><?= $this->session->flashdata('pesan_sukses'); ?></font></b></center><br />
							<form class="form-auth-small" action="<?=base_url('admin/proses_login')?>" method="post">
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
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Admin | PPOB Listrik</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

	<!-- Modal Pesan -->
	<div class="modal fade" id="pesan" role="dialog">
		 <div class="modal-dialog">
			 <div class="modal-content">
					 <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
							 <h4 class="modal-title">
								 <center>
										<font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
								 </center>
							 </h4>
					 </div>
			 </div>
		 </div>
	</div>

<script>
  function FPassword() {
    var x = document.getElementById("sp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
  }
 </script>
</body>

</html>
