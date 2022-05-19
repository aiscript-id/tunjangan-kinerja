<!-- button tambah jabatan -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Jabatan</h3>
				<!-- button add -->
				<div class="pull-right">
					<!-- button modal add jabatan -->
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-jabatan">
						<i class="fa fa-plus"></i> Tambah
					</button>
					<!-- modal -->
					<!-- modal add jabatan -->
					<!-- Button trigger modal -->
					<?php 
						$kelas = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18'];
					?>
					<div class="modal fade" id="modal-add-jabatan"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Jabatan</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('admin/jabatan/store'); ?>" method="post">
													
										<div class="form-group">
											<label for="kelas">Kelas / Golongan</label>
											<select name="kelas" id="kelas" class="form-control">
												<option value="">Pilih Kelas / Golongan</option>
												<?php foreach ($kelas as $kls) : ?>
													<option value="<?= $kls; ?>"><?= $kls; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="form-group">
											<label for="jabatan">Jabatan</label>
											<input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
										</div>

										<div class="form-group">
											<label for="tunjangan">Tunjangan</label>
											<input type="number" name="tunjangan" id="tunjangan" class="form-control" placeholder="Tunjangan">
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
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Kelas / Golongan</th>
								<th>Jabatan</th>
								<th>Tunjangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($jabatans as $jabatan) : ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $jabatan->kelas; ?></td>
									<td><?= $jabatan->jabatan; ?></td>
									<td>Rp. <?= rupiah($jabatan->tunjangan); ?></td>
									<td>
										<!-- modal edit jabatan -->
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-jabatan<?= $jabatan->id; ?>">
											<i class="fa fa-edit"></i> Edit
										</button>

										<!-- modal -->
										<!-- modal edit jabatan -->
										<!-- Button trigger modal -->
										<div class="modal fade" id="modal-edit-jabatan<?= $jabatan->id; ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Edit Jabatan</h4>
													</div>
													<div class="modal-body">
														<form action="<?= base_url('admin/jabatan/update'); ?>" method="post">
															<input type="hidden" name="id" value="<?= $jabatan->id; ?>">

															<div class="form-group">
																<label for="kelas">Kelas / Golongan</label>
																<select name="kelas" id="kelas" class="form-control">
																	<option value="">Pilih Kelas</option>
																	<?php foreach ($kelas as $kls) : ?>
																		<option value="<?= $kls; ?>" <?= $jabatan->kelas == $kls ? 'selected' : ''; ?>><?= $kls; ?></option>
																	<?php endforeach; ?>
																</select>
															</div>

															<div class="form-group">
																<label for="jabatan">Jabatan</label>
																<input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= $jabatan->jabatan; ?>">
															</div>

															<div class="form-group">
																<label for="tunjangan">Tunjangan</label>
																<input type="number" name="tunjangan" id="tunjangan" class="form-control" value="<?= $jabatan->tunjangan; ?>">
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
										
										<a href="<?= site_url('admin/jabatan/delete/'.$jabatan->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
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



