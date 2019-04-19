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
	input[type="checkbox"],
	input[type="radio"] {
		position: absolute;
		right: 9000px;
	}

	/*Check box*/
	input[type="checkbox"]+.label-text:before {
		content: "\f096";
		font-family: "FontAwesome";
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		width: 1em;
		display: inline-block;
		margin-right: 5px;
	}

	input[type="checkbox"]:checked+.label-text:before {
		content: "\f14a";
		color: #2980b9;
		animation: effect 250ms ease-in;
	}

	input[type="checkbox"]:disabled+.label-text {
		color: #aaa;
	}

	input[type="checkbox"]:disabled+.label-text:before {
		content: "\f0c8";
		color: #ccc;
	}

	/*Radio box*/

	input[type="radio"]+.label-text:before {
		content: "\f10c";
		font-family: "FontAwesome";
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		width: 1em;
		display: inline-block;
		margin-right: 5px;
	}

	input[type="radio"]:checked+.label-text:before {
		content: "\f192";
		color: #8e44ad;
		animation: effect 250ms ease-in;
	}

	input[type="radio"]:disabled+.label-text {
		color: #aaa;
	}

	input[type="radio"]:disabled+.label-text:before {
		content: "\f111";
		color: #ccc;
	}

	/*Radio Toggle*/

	.toggle input[type="radio"]+.label-text:before {
		content: "\f204";
		font-family: "FontAwesome";
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		width: 1em;
		display: inline-block;
		margin-right: 10px;
	}

	.toggle input[type="radio"]:checked+.label-text:before {
		content: "\f205";
		color: #16a085;
		animation: effect 250ms ease-in;
	}

	.toggle input[type="radio"]:disabled+.label-text {
		color: #aaa;
	}

	.toggle input[type="radio"]:disabled+.label-text:before {
		content: "\f204";
		color: #ccc;
	}


	@keyframes effect {
		0% {
			transform: scale(0);
		}

		25% {
			transform: scale(1.3);
		}

		75% {
			transform: scale(1.4);
		}

		100% {
			transform: scale(1);
		}
	}
</style>

<h2 class="page-title"><strong><?= $judul ?></strong></h2>
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"></h3>
			</div>
			<div class="panel-body">
				<a data-toggle="modal" data-target="#tambah" class="btn btn-primary">+ Tambah Data Admin</a><br><br>
				<table id="tabelbiasa" class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Username</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($DataAdmin as $data) {  ?>
						<tr>
							<td>
								<?=$no++ ?>
							</td>
							<td>
								<?=$data->nama_admin ?>
							</td>
							<td>
								<?=$data->username ?>
							</td>
							<td>
								<?=$data->nama_level?>
							</td>

							<td>
								<a class="btn btn-primary" data-toggle="modal" data-target="#edit" href="#"
									onclick="edit('<?=$data->id_admin?>')">Edit</a>
								<a class="btn btn-danger" data-toggle="modal" data-target="#hapus" href="#"
									onclick="edit('<?=$data->id_admin?>')">Hapus</a>
							</td>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<!-- Modal Tambah Admin-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4><strong>Tambah Data Admin</strong></h4>
			</div>
			<div class="modal-body">
				<br />

				<form action="<?=base_url('data_admin/tambah_admin')?>" method="post" class="form-horizontal form-label-left">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="nama_admin" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Level : </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control col-md-7 col-xs-12" name="id_level" required="required">
								<option>Pilih Level</option>
								<?php foreach ($DataLevel as $data) {  ?>
								<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password : </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="password" id="sp" name="password" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label>
								<input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span
									class="label-text">Lihat Password</span>
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

<!-- Modal Edit Data Admin-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4><strong>Edit Data Admin</strong></h4>
			</div>
			<div class="modal-body">
				<br />

				<form action="<?=base_url('data_admin/edit_admin')?>" method="post" class="form-horizontal form-label-left">

					<input type="hidden" id="id_admin" name="id_admin" required="required"
						class="form-control col-md-7 col-xs-12">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Admin :
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="nama_admin" name="nama_admin" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username : </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="username" name="username" required="required"
								class="form-control col-md-7 col-xs-12">
						</div>
					</div>

					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Level : </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control col-md-7 col-xs-12" id="id_level" name="id_level" required="required">
								<option>Pilih Level</option>
								<?php foreach ($DataLevel as $data) { ?>
								<option value="<?=$data->id_level?>"><?= $data->nama_level ?></option>
								<?php } ?>
							</select>
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

<!--  Konfirmasi Hapus Admin -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3><strong>Hapus Data Admin</strong></h3>
			</div>
			<div class="modal-body">
				<h4>Anda Yakin Ingin Menghapus Admin ?</h4>
			</div>
			<form action="<?=base_url('data_admin/hapus_admin')?>" method="post" class="form-horizontal form-label-left">

				<input type="hidden" id="id_admin1" name="id_admin" required="required" class="form-control col-md-7 col-xs-12">

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<input type="submit" value="Konfirmasi" class="btn btn-primary">
				</div>
		</div>
		</form>
	</div>
</div>

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

<script type="text/javascript">
	function edit(a) {
		$.ajax({
			type: "post",
			url: "<?=base_url()?>data_admin/detail_admin/" + a,
			dataType: "json",
			success: function (data) {
				$("#id_admin").val(data.id_admin);
				$("#id_admin1").val(data.id_admin);
				$("#nama_admin").val(data.nama_admin);
				$("#id_level").val(data.id_level);
				$("#username").val(data.username);
			}
		});
	}
</script>
