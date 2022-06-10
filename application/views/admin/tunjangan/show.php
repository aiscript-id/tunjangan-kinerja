<!-- button tambah tunjangan -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Tunjangan</h3>
				<!-- button add -->
				<div class="pull-right">
					<!-- to index kehadiran -->
					<?php if($this->session->userdata('id_role') == 1): ?>
					<a href="<?= base_url('admin/kehadiran/kehadiran/'.$periode->tanggal) ?>" class="btn btn-info btn-sm">Cek Kehadiran</a>
					<a href="<?= base_url('admin/tunjangan/add/'.$periode->tanggal) ?>" class="btn btn-primary btn-sm">Hitung Tunjangan</a>
					<!-- kembali -->
					<a href="<?= base_url('admin/tunjangan'); ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<?php elseif($this->session->userdata('id_role') == 3): ?>
					<a href="<?= base_url('petugas/kehadiran/kehadiran/'.$periode->tanggal) ?>" class="btn btn-info btn-sm">Cek Kehadiran</a>
					<a href="<?= base_url('petugas/tunjangan/add/'.$periode->tanggal) ?>" class="btn btn-primary btn-sm">Hitung Tunjangan</a>
					<!-- kembali -->
					<a href="<?= base_url('petugas/tunjangan'); ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<?php endif; ?>
				</div>	
			</div>
			<div class="card-body">
				<div class="alert alert-warning" role="alert">
				  <h6 class="alert-heading text-bold">Perhatian !</h6>
				  <p class="mb-0 text-sm">
					Klik <b>"Hitung Kehadiran"</b>  untuk menambahkan data tunjangan dari hasil perhitungan kehadiran. <br>
					Pastikan data tunjangan telah sesuai karena data yang telah dilakukan <b>"Validasi"</b>  tidak dapat diubah kembali.
				  </p>
				</div>
				<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-striped is-narrow">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Jumlah Tunjangan</th>
								<th>Potongan</th>
								<th>Tunjangan (%)</th>
								<th>Total</th>
								<th>Laporan Kinerja</th>
								<th>Penilaian</th>
								<th>Validasi</th>
								<th>Tanggal Terima</th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($tunjangans) > 0) : ?>
							<?php $no = 1; ?>
							<?php foreach ($tunjangans as $tunjangan) : ?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $tunjangan->first_name .' '. $tunjangan->last_name?></td>
									<td><?= $tunjangan->username ?></td>
									<td><?= rupiah($tunjangan->tunjangan); ?></td>
									<td><?= $tunjangan->total_potongan; ?> %</td>
									<td><?= 100 - $tunjangan->total_potongan ?> %</td>
									<td><?= rupiah($tunjangan->total_tunjangan); ?></td>
									<td >
									<?php if ($tunjangan->validasi != 1) { ?>
										<a href="<?= base_url('admin/lapkin/delete/'. $tunjangan->id); ?>" onclick="confirm('Yakin ingin menghapus data ini?')"  class="btn btn-sm btn-default">
											<i class="fa fa-trash text-danger"></i>
										</a>
									<?php } ?>
									<?php if ($tunjangan->file_lapkin == null) { ?>
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-import-<?= $tunjangan->id ?>">
											Import Laporan Kinerja
										</button>
									<?php } else { ?>
										<a href="<?= base_url('admin/lapkin/show/' . $tunjangan->id); ?>" class="btn btn-sm btn-success" title="Tambah Laporan Kinerja">Lihat Laporan</a>
									<?php }  ?>
	
									</td>
									<td class="text-center">
										<?php if (!@$tunjangan->penilaian) { ?>
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-nilai-<?= $tunjangan->id ?>">
												Beri Nilai
											</button>
										<?php } else { ?>
											<?= $tunjangan->penilaian ?? 0 ?>
										<?php }  ?>
									</td>
									<td class="text-center">
									<?php if ($tunjangan->validasi == 1){?>
											<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-check text-success"></i></div>
										<?php } else { ?>
											<a href="
											<?php if($this->session->userdata('id_role') == 1): ?>
											<?=base_url('admin/tunjangan/validasi/').$tunjangan->id ?>
											<?php else: ?>
											<?=base_url('petugas/tunjangan/validasi/').$tunjangan->id ?>
											<?php endif; ?>
	
											" class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-hourglass-half"></i></a>
										<?php } ?>
									</td>
									<td>
										<?php if($tunjangan->tanggal_terima == null && $this->session->userdata('id_role') == 1) : ?>
											<a href="<?= base_url('admin/tunjangan/terima/'.$tunjangan->id) ?>" class="btn btn-success btn-sm">Terima</a>
										<?php else : ?>
											<?= tgl_indo($tunjangan->tanggal_terima) ?>
										<?php endif; ?>
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
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
	
								<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" id="modal-nilai-<?= $tunjangan->id; ?>">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Penilaian Laporan Kinerja</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?php if($this->session->userdata('id_role') == 1): ?><?= base_url('admin/tunjangan/nilai/'.$tunjangan->id); ?><?php else: ?><?=base_url('petugas/tunjangan/nilai/').$tunjangan->id ?><?php endif; ?>" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<label for="">Penilaian Kinerja</label>
														<!-- number -->
														<input type="number" name="penilaian" class="form-control" max="100" min="0" value="<?= $tunjangan->penilaian; ?>" required>
													</div>
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-sm"> Simpan</button>
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
									<td colspan="8" class="text-center">Tidak ada data. <br> Silahkan klik tombol <b>Cek Kehadiran</b> untuk mendapatkan data perhitungan tunjangan. <br> Pastikan data kehadiran pada periode yang sama telah diverifikasi</td>
								</tr>
							<?php endif ?>
	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



