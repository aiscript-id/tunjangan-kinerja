<!-- button tambah lapkin -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Laporan Kinerja</h3>
				<!-- button add -->
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Laporan Kinerja</th>
							<th>Periode Tunjangan</th>
							<th class="text-center">Validasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($tunjangans) > 0) : ?>
						<?php $no = 1; ?>
						<?php foreach ($tunjangans as $tunjangan) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $tunjangan->name_periode ?></td>
								<td><?= $tunjangan->periode; ?></td>
								<td class="text-center">
								<?php if ($tunjangan->validasi == 1){?>
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-check text-success"></i></div>
									<?php } else { ?>
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-hourglass-half text-secondary"></i></div>
									<?php } ?>
								</td>
								<td>
									<!-- check file_lapkin -->
									<?php if ($tunjangan->file_lapkin) { ?>
										<a href="<?= base_url('pegawai/lapkin/show/' . $tunjangan->id); ?>" class="btn btn-sm btn-success" title="Tambah Laporan Kinerja">Lihat Laporan</a>
									<?php } else { ?>
										<!-- modal button import -->
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-import-<?= $tunjangan->id ?>">
											Import Laporan Kinerja
										</button>
									<?php } ?>

								</td>
							</tr>
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
								<td colspan="6" class="text-center">Tidak ada data. <br> Silahkan klik tombol <b>Cek Kehadiran</b> untuk mendapatkan data perhitungan lapkin. <br> Pastikan data kehadiran pada periode yang sama telah diverifikasi</td>
							</tr>
						<?php endif ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>





