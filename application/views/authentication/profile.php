<div class="row">
	<div class="col-md-3">
		<!-- Profile Image -->
		<div class="card card-primary">
			<div class="card-body card-profile text-center">
				<img class="profile-user-img img-responsive img-circle" src="
				<?php 
					if (@$userdata->photo) {
						echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); 
					} else {
						echo base_url('assets/uploads/images/no_image.png');
					}
                ?> 
				" style="width:125px; height:125px">

				<h3 class="profile-username text-center"><?= $userdata->first_name; ?> <?= $userdata->last_name; ?></h3>

				<p class="text-muted text-center">
					<?= $userdata->name;?>
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Username</b><br><a><?= $userdata->username; ?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Tanggal Daftar</b><br><a><?= tgl_lengkap($userdata->created_at);?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Terakhir Login</b><br><a><?= tgl_lengkap($userdata->last_login);?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-9">
		<div class="card card-primary card-outline card-outline-tabs">
			<div class="card-header p-0 border-bottom-0">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="active nav-link" href="#settings" data-toggle="tab">Ubah Akun</a></li>
					<li class="nav-item"><a class="nav-link" href="#datadiri" data-toggle="tab">Ubah Data Diri</a></li>
					<li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Ubah Password</a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="active tab-pane" id="settings">
						<form class="form-horizontal" action="<?php echo base_url('auth/updateProfile') ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input type="text" readonly class="form-control" placeholder="Username" name="username" value="<?= $userdata->username; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Depan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Nama Depan" name="first_name" value="<?= $userdata->first_name; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Belakang</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Nama Belakang" name="last_name" value="<?= $userdata->last_name; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" placeholder="Email" name="email" value="<?= $userdata->email; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Telp</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" placeholder="Telp" name="phone" value="<?= $userdata->phone; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Foto</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" placeholder="Foto" name="photo">
								</div>
							</div>
	
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="datadiri">
						<form class="form-horizontal" action="<?php echo base_url('auth/updateDataDiri') ?>" method="POST">
							<!-- agama -->
							<div class="form-group">
								<label class="col-sm-2 control-label">Agama</label>
								<div class="col-sm-10">
									<select class="form-control" name="agama">
										<option value="">-- Pilih Agama --</option>
										<option value="Islam" <?php if($userdata->agama == 'Islam'){echo "selected";} ?>>Islam</option>
										<option value="Kristen" <?php if($userdata->agama == 'Kristen'){echo "selected";} ?>>Kristen</option>
										<option value="Katolik" <?php if($userdata->agama == 'Katolik'){echo "selected";} ?>>Katolik</option>
										<option value="Hindu" <?php if($userdata->agama == 'Hindu'){echo "selected";} ?>>Hindu</option>
										<option value="Budha" <?php if($userdata->agama == 'Budha'){echo "selected";} ?>>Budha</option>
										<option value="Konghucu" <?php if($userdata->agama == 'Konghucu'){echo "selected";} ?>>Konghucu</option>
									</select>
								</div>
							</div>
							<!-- jenis kelamin -->
							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-10">
									<select class="form-control" name="jk">
										<option value="">-- Pilih Jenis Kelamin --</option>
										<option value="L" <?php if($userdata->jk == 'L'){echo "selected";} ?>>Laki-Laki</option>
										<option value="P" <?php if($userdata->jk == 'P'){echo "selected";} ?>>Perempuan</option>
									</select>
								</div>
							</div>

							<!-- ttl -->
							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Tanggal Lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Tempat Tanggal Lahir" name="ttl" value="<?= $userdata->ttl; ?>">
								</div>
							</div>

							<!-- pendidikan -->
							<div class="form-group">
								<label class="col-sm-2 control-label">Pendidikan</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" value="<?= $userdata->pendidikan; ?>">
								</div>
							</div>

							<!-- alamat -->
							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="3" placeholder="Alamat" name="alamat"><?= $userdata->alamat; ?></textarea>
								</div>
							</div>
	
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="password">
						<form class="form-horizontal" action="<?php echo base_url('auth/updatePassword') ?>" method="POST">
							<div class="form-group">
								<label for="passLama" class="col-sm-2 control-label">Password Lama</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" placeholder="Password Lama" name="passLama">
								</div>
							</div>
							<div class="form-group">
								<label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
								</div>
							</div>
							<div class="form-group">
								<label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
								</div>
							</div>
	
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
