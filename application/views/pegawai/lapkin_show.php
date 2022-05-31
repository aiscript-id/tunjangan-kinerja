<!-- button tambah lapkin -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Laporan Kinerja</h3>
				<!-- button refresh data -->
				<div class="card-tools">
					<?php if ($tunjangan->validasi != 1) { ?>
						<a href="<?= base_url('pegawai/lapkin/delete/'. $tunjangan->id); ?>" onclick="confirm('Yakin ingin menghapus data ini?')"  class="btn btn-sm btn-default">
							<i class="fa fa-trash text-danger"></i>
						</a>
					<?php } ?>
					<?php if ($tunjangan->file_lapkin == null) { ?>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-import-<?= $tunjangan->id ?>">
							Import Laporan Kinerja
						</button>
					<?php } ?>

					<?php if($this->session->userdata('id_role') == 1) { ?>
						<!-- back -->
						<a href="<?= base_url('admin/tunjangan/show/'.$tunjangan->periode); ?>" class="btn btn-sm btn-warning">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
					<?php } ?>

					<?php if($this->session->userdata('id_role') == 4) { ?>
						<!-- back -->
						<a href="<?= base_url('pegawai/lapkin'); ?>" class="btn btn-sm btn-warning">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
					<?php } ?>

				</div>
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" id="modal-import-<?= $tunjangan->id; ?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Import Laporan Kinerja</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('import/ImportLaporanKinerja/import_excel/'.$tunjangan->id); ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">File Laporan Kinerja</label>
										<input type="file" name="fileExcel" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="">Periode</label>
										<input type="text" name="periode" class="form-control" value="<?= $tunjangan->periode; ?>" readonly>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!-- confirm('Yakin ingin menghapus data ini?') -->


			</div>
			<div class="card-body">
				<table id="datatable" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama Kegiatan</th>
							<th>Output</th>
							<th>Pengguna</th>
							<th>Jenis Tugas</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($lapkins) > 0) : ?>
						<?php $no = 1; ?>
						<?php foreach ($lapkins as $lapkin) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $lapkin->tanggal_kegiatan ?></td>
								<td><?= $lapkin->nama_kegiatan; ?></td>
								<td><?= $lapkin->output ?></td>
								<td><?= $lapkin->pengguna ?></td>
								<td><?= $lapkin->jenis_tugas ?></td>
							</tr>
						<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" id="modal-import-<?= $lapkin->id; ?>">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Import Laporan Kinerja</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="<?= base_url('import/ImportLaporanKinerja/import_excel/'.$lapkin->id); ?>" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label for="">File Laporan Kinerja</label>
												<input type="file" name="fileExcel" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="">Periode</label>
												<input type="text" name="periode" class="form-control" value="<?= $lapkin->periode; ?>" readonly>
											</div>
											<!-- <div class="form-group">
												<label for="">Validasi</label>
												<select name="validasi" class="form-control" required>
													<option value="">-- Pilih --</option>
													<option value="1">Valid</option>
													<option value="0">Tidak Valid</option>
												</select>
											</div> -->
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php $no++; ?>
						<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="6" class="text-center">Tidak ada data. <br> Silahkan input data excel dengan nama worksheet "Lap Kinerja Bulanan" untuk menambahkan data laporan kinerja</td>
							</tr>
						<?php endif ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>





