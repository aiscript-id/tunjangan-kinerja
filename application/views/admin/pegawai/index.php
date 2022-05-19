<!-- button tambah pegawai -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Pegawai</h3>
				<!-- button add -->
				<div class="pull-right">
					<a href="<?= base_url('admin/pegawai/add')?>" class="btn btn-primary btn-sm">
						<i class="fa fa-plus"></i> Tambah
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Role</th>
								<th>NIP</th>
								<th>Jabatan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($pegawais as $pegawai) : ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $pegawai->first_name; ?> <?= $pegawai->last_name; ?></td>
									<td><?= $pegawai->name ?></td>
									<td><?= $pegawai->username; ?></td>
									<td><?= $pegawai->jabatan; ?></td>
									<td>
										<a href="<?= base_url('admin/pegawai/edit/'.$pegawai->id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
										<a href="<?= site_url('admin/pegawai/delete/'.$pegawai->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
										<!-- delete with param id -->


									</td>
								</tr>
								<?php $no++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end button tambah pegawai -->
<!-- <div class="table-responsive" style="padding-top: 6px">
	<table class="table table-striped table-hover table-condensed" id="mytable" style="width: 100%">
		<thead>
			<tr class="active">
				<th class="text-center" width="30px" style="padding-left: 20px;">No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th class="text-center" width="160px" style="padding-left: 20px;">Tindakan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1;
			foreach ($pegawais as $pegawai) { ?>
				<tr>
					<td class="text-center" width="30px" style="padding-left: 20px;"><?= $no++ ?></td>
					<td><?= $pegawai->name ?></td>
					<td><?= $pegawai->address ?></td>
					<td class="text-center" width="160px" style="padding-left: 20px;">
						<?php echo anchor('admin/pegawai/detail/' . $pegawai->id, 'Detail'); ?> |
						<?php echo anchor('admin/pegawai/edit/' . $pegawai->id, 'Update'); ?> |
						<?php echo anchor('admin/pegawai/delete/' . $pegawai->id, 'Delete'); ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div> -->
