<!-- button tambah jabatan -->
<!-- script datepicker -->
<!--  -->
<script type="text/javascript">
$(function() {
	$('#datepicker').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	});
});
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Periode Kehadiran</h3>
				<!-- button add -->
				<?php if($this->session->userdata('id_role') == 1): ?>
				<div class="pull-right">
					<!-- button modal add jabatan -->
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-periode">
						<i class="fa fa-plus"></i> Tambah
					</button>
					<!-- modal -->
					<!-- modal add jabatan -->
					<!-- Button trigger modal -->
					<?php 
						// create 12 mont-year
						$date = array();
						for ($i=12; $i >= 0; $i--) {
							$date[$i] = date('m-Y', strtotime('-'.$i.' month'));
						}
						for ($i=0; $i <= 12; $i++) {
							$date[$i] = date('m-Y', strtotime('+'.$i.' month'));
						}
						// create 12 mont-year

					?>
					<div class="modal fade" id="modal-add-periode"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Periode Kehadiran</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('admin/kehadiran/periodeStore'); ?>" method="post">
										<!-- hidden id -->
										<div class="form-group">
											<label for="">Nama Periode</label>
											<input type="text" name="periode" class="form-control" placeholder="Periode" required>
											<!-- alert -->
											<?= form_error('periode', '<small class="text-danger">', '</small>') ?>
										</div>
										<div class="form-group">
											<label for="">Periode</label>
											<!-- select $date -->
											<select name="tanggal" class="form-control" required>
												<option value="">Pilih Periode</option>
												<?php foreach ($date as $key => $value): ?>
													<option value="<?= $value; ?>"><?= $value; ?></option>
												<?php endforeach ?>
											</select>
											<?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
												
										</div>

										<!-- hari kerja -->
										<div class="form-group">
											<label for="">Hari Kerja</label>
											<input type="number" name="hari_kerja" class="form-control" placeholder="Hari Kerja" required>
											<!-- alert -->
											<?= form_error('hari_kerja', '<small class="text-danger">', '</small>') ?>
										</div>

										<!-- awal -->
										<div class="form-group">
											<label for="">Awal</label>
											<input type="text" name="awal" class="form-control" id="datepicker" placeholder="Awal" required>
											<!-- alert -->
											<?= form_error('awal', '<small class="text-danger">', '</small>') ?>
										</div>

										<!-- akhir -->
										<div class="form-group">
											<label for="">Akhir</label>
											<input type="text" name="akhir" class="form-control" id="datepicker" placeholder="Akhir" required>
											<!-- alert -->
											<?= form_error('akhir', '<small class="text-danger">', '</small>') ?>
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
				<?php endif; ?>
			</div>

			<!-- card body -->
			<div class="card-body">
				<!-- table -->
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="10">No</th>
								<!-- <th>Nama Periode</th> -->
								<th class="text-center">Periode</th>
								<th>Awal</th>
								<th>Akhir</th>
								<th>Hari Kerja</th>
								<th class="d-none">Total Tunjangan</th>
								<th class="text-center d-none">Verifikasi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($periode as $value => $per): ?>
							<tr>
								<td><?= $value+1 ?></td>
								<!-- <td><?= $per->periode; ?></td> -->
								<td class="text-center"><?= $per->tanggal; ?></td>
								<td class="text-center"><?= tgl_indo($per->awal) ?></td>
								<td class="text-center"><?= tgl_indo($per->akhir) ?></td>								
								<td><?= $per->hari_kerja ?></td>
								<td class="d-none">
									<?php
										$total = $this->db->query("SELECT SUM(total_tunjangan) AS total FROM tunjangan WHERE periode = '$per->tanggal'")->row();
										echo "Rp. ".number_format($total->total, 0, ',', '.');
									?>

									<?= $total->total ?>
								</td>
								<td class="text-center d-none">
									<?php if ($per->verifikasi == 1): ?>
										<span class="badge badge-success"> Sudah</span>
									<?php else: ?>
										<span class="badge badge-danger">Belum</span>
									<?php endif ?>
								</td>
								<td>
									<?php if($this->session->userdata('id_role') == 1): ?>
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-periode<?= $per->id; ?>">
										<i class="fa fa-edit"></i> Edit
									</button>
									<!-- input kehadiran -->
									<a href="<?= base_url('admin/kehadiran/kehadiran/'.$per->tanggal) ?>" class="btn btn-primary btn-sm">
										<i class="fa fa-list"></i> Kehadiran
									</a>
									<?php endif; ?>
									<!-- input kehadiran -->
									<?php if($this->session->userdata('id_role') == 3): ?>
									<a href="<?= base_url('petugas/kehadiran/kehadiran/'.$per->tanggal) ?>" class="btn btn-primary btn-sm">
										<i class="fa fa-list"></i> Kehadiran
									</a>
									<?php endif; ?>

									<?php if($this->session->userdata('id_role') == 2): ?>
									<a href="<?= base_url('kepala/kehadiran/kehadiran/'.$per->tanggal) ?>" class="btn btn-primary btn-sm">
										<i class="fa fa-list"></i> Kehadiran
									</a>
									<?php endif; ?>

								</td>
							</tr>
	
							<!-- modal -->
							<!-- modal edit -->
							<div class="modal fade" id="modal-edit-periode<?= $per->id; ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Periode Kehadiran</h4>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('admin/kehadiran/periodeUpdate'); ?>" method="post">
												<div class="form-group">
													<label for="">Nama Periode</label>
													<input type="text" name="periode" class="form-control" value="<?= $per->periode; ?>" required>
													<!-- alert -->
													<?= form_error('periode', '<small class="text-danger">', '</small>') ?>
												</div>
	
												<div class="form-group">
													<label for="">Periode</label>
													<!-- select $date -->
													<select name="tanggal" class="form-control" required>
														<option value="">Pilih Periode</option>
														<?php foreach ($date as $key => $d): ?>
															<option value="<?= $d; ?>" <?php if($d == $per->tanggal){echo "selected";} ?>><?= $d; ?></option>
														<?php endforeach ?>
													</select>
												</div>

												<!-- awal -->
												<div class="form-group">
													<label for="">Awal</label>
													<input type="date" name="awal" class="form-control" value="<?= $per->awal; ?>" required>
													<!-- alert -->
													<?= form_error('awal', '<small class="text-danger">', '</small>') ?>
												</div>

												<!-- akhir -->
												<div class="form-group">
													<label for="">Akhir</label>
													<input type="date" name="akhir" class="form-control" value="<?= $per->akhir; ?>" required>
													<!-- alert -->
													<?= form_error('akhir', '<small class="text-danger">', '</small>') ?>
												</div>

												<div class="form-group">
													<label for="">Hari Kerja</label>
													<input type="number" name="hari_kerja" class="form-control" value="<?= $per->hari_kerja; ?>" required>
													<!-- alert -->
													<?= form_error('hari_kerja', '<small class="text-danger">', '</small>') ?>
												</div>
												<input type="hidden" name="id" value="<?= $per->id; ?>">
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- end modal edit -->
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>



