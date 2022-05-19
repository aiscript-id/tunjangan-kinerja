<!-- button tambah potongan -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data potongan</h3>
				<!-- button add -->
				<div class="pull-right">
					<!-- button modal add potongan -->
					<button type="button" class="btn btn-primary btn-sm d-none" data-toggle="modal" data-target="#modal-add-potongan">
						<i class="fa fa-plus"></i> Tambah
					</button>
					<!-- modal -->
					<!-- modal add potongan -->
					<!-- Button trigger modal -->
					<?php 
						$kelas = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18'];
					?>
					<div class="modal fade" id="modal-add-potongan"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah potongan</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('admin/potongan/store'); ?>" method="post">

										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Nama">
										</div>

										<div class="form-group">
											<label for="potongan">Potongan (%)</label>
											<input type="text" name="potongan" id="potongan" class="form-control" placeholder="Potongan">
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Nama</th>
							<th>Potongan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($potongans as $potongan) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td class="text-uppercase"><?= $potongan->kode ?></td>
								<td><?= $potongan->name; ?></td>
								<td><?= $potongan->potongan; ?></td>
								<td>
									<!-- modal edit potongan -->
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-potongan<?= $potongan->id; ?>">
										<i class="fa fa-edit"></i> Edit
									</button>
									<!-- end modal -->
									
									<!-- <a href="<?= site_url('admin/potongan/delete/'.$potongan->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a> -->
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

<!-- foreach -->
<?php foreach ($potongans as $potongan) : ?>
	<!-- modal edit potongan -->
	<!-- modal -->
	<div class="modal fade" id="modal-edit-potongan<?= $potongan->id; ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit potongan</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('admin/potongan/update'); ?>" method="post">
						<input type="hidden" name="id" value="<?= $potongan->id; ?>">
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" name="name" id="name" class="form-control" value="<?= $potongan->name; ?>">
						</div>
						<div class="form-group">
							<label for="potongan">Potongan (%)</label>
							<input type="text" name="potongan" id="potongan" class="form-control" value="<?= $potongan->potongan; ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal -->
<?php endforeach; ?>



