<!-- card form -->
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Form Pegawai</h3>
		<!-- button back -->
		<div class="pull-right">
			<a href="<?= base_url('admin/pegawai') ?>" class="btn btn-warning btn-sm">
				<i class="fa fa-arrow-left"></i> Kembali
			</a>
		</div>
	</div>
	<!-- card-body -->
	<div class="card-body">
		<h6 class="text-bold text-primary">Akun</h6>
		<hr>
		<?php if (@$pegawai):?>
			<form action="<?= base_url('admin/pegawai/update') ?>" method="post">
			<input type="hidden" value="<?= $pegawai->id ?>">
		<?php else: ?>
			<form action="<?= base_url('admin/pegawai/create') ?>" method="post">
		<?php endif; ?>
		<!-- form -->
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label for="first_name">Nama Depan</label>
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nama Depan" value="<?=  $pegawai->first_name ?? set_value('first_name') ?>" required>
					<?= form_error('first_name', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="last_name">Nama Belakang</label>
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nama Belakang" value="<?=  $pegawai->last_name ?? set_value('last_name') ?>" required>
					<?= form_error('last_name', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="username">Username / NIP</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username / NIP" value="<?=  $pegawai->username ?? set_value('username') ?>">
					<?= form_error('username', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group has-feedback">
					<label for="username">Password</label>
					<input type="password" name="password" class="form-control" required placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<?php echo form_error('password','<div class="text-danger"><small>','</small></div>') ;?>
				</div>
			</div>
			<div class="col-6">
				<!-- role from tbl_role -->
				<?php 
					$role = $this->db->order_by('id', 'desc')->get('tbl_role')->result();
				?>
				<div class="form-group">
					<label for="role">Role</label>
					<select name="id_role" id="role" class="form-control">
						<option value="">Pilih Role</option>
						<?php foreach ($role as $r) : ?>
						<option <?php if($pegawai->id_role == $r->id) {echo 'selected';} ?> value="<?= $r->id ?>"><?= $r->name ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('role', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>

		</div>
		<!-- alamat -->
		<!-- /form -->
	</div>
	<!-- /card-body -->
	<!-- card-footer -->
	<!-- /card-footer -->
</div>

<div class="card">
	<div class="card-body">
		<h6 class="text-bold text-primary">Kepegawaian</h6>
		<hr>
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label for="status_kepegawaian">Status Kepegawaian</label>
					<!-- select status -->
					<select name="status_kepegawaian" id="status_kepegawaian" class="form-control" required>
						<option value="">Pilih Status Kepegawaian</option>
						<option  <?php if($pegawai->status_kepegawaian == 1) {echo 'selected';} ?> value="1">PNS</option>
						<option  <?php if($pegawai->status_kepegawaian == 2) {echo 'selected';} ?> value="2">Non-PNS</option>
					</select>
					<?= form_error('status_kepegawaian', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="status_kepegawaian">Jabatan</label>
					<!-- select status -->
					<select name="jabatan_id" id="jabatan_id" class="form-control" required>
						<option value="">Pilih Jabatan</option>
						<?php foreach ($jabatan as $j) : ?>
							<option <?php if($pegawai->jabatan_id == $j->id) {echo 'selected';} ?> value="<?= $j->id ?>"><?= $j->jabatan ?></option>
						<?php endforeach; ?>
					</select>
					<?= form_error('status_kepegawaian', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!--  -->
<div class="card">
	<div class="card-body">
		<h6 class="text-bold text-primary">Data Diri</h6>
		<hr>
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=  $pegawai->email ?? set_value('email') ?>">
					<?= form_error('email', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="phone">Telepon</label>
					<input type="text" name="phone" id="phone" class="form-control" placeholder="Telepon" value="<?= $pegawai->phone ?? set_value('phone') ?>">
					<?= form_error('phone', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="pendidikan">Pendidikan</label>
					<input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="<?=  $pegawai->pendidikan ?? set_value('pendidikan') ?>" required>
					<?= form_error('pendidikan', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="agama">Agama</label>
					<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" value="<?= $pegawai->agama ?? set_value('agama') ?>" required>
					<?= form_error('agama', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="ttl">Tempat Tanggal Lahir</label>
					<input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir" value="<?=  $pegawai->ttl ?? set_value('ttl') ?>" required>
					<?= form_error('ttl', '<small class="text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="jk">Jenis Kelamin</label>
					<select name="jk" id="jk" class="form-control" required>
						<option value="">Pilih Jenis Kelamin</option>
						<option <?php if($pegawai->jk == 'L') {echo 'selected';} ?> value="L">Laki-Laki</option>
						<option <?php if($pegawai->jk == 'P') {echo 'selected';} ?> value="P">Perempuan</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="alamat">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?= set_value('alamat') ?><?=  $pegawai->alamat ?? set_value('alamat') ?></textarea>
			<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Simpan</button>
	</div>
	</form>
</div>
