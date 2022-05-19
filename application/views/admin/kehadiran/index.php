<!-- button tambah kehadiran -->
<div class="row">
	<div class="col-md-12">
		<div class="card border-primary">
		  <div class="card-body">
			  <div class="row">
				  <div class="col-4">
					  <h4 class="card-title"><?= $periode->periode ?></h4>
					  <br>
					  <p class="mb-0 text-muted text-sm">Pegawai : <?= count($kehadirans); ?></p>
				  </div>
				  <?php if($this->session->userdata('id_role') == 1): ?>
				<div class="col-sm-8">
					<form action="<?= base_url('import/ImportKehadiran/import_excel'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Pilih File Excel : </label>
							<input type="file" name="fileExcel">
							<button class='btn btn-success btn-sm' type="submit">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								Import		
							</button>
						</div>
					</form>
				</div>
				<?php endif; ?>

			</div>
		  </div>
		</div>
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Kehadiran</h3>
				<!-- button add -->
				<div class="pull-right">
					<!-- button modal add kehadiran -->
					<?php if($this->session->userdata('id_role') == 1): ?>

					<a href="<?= base_url('admin/tunjangan/show/'. $periode->tanggal); ?>" class="btn btn-info btn-sm">
						Lihat Tunjangan
					</a>
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add-kehadiran">
						<i class="fa fa-plus"></i> Tambah
					</button>
					<!-- kembali -->
					<a href="<?= base_url('admin/kehadiran'); ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<!-- modal -->
					<!-- modal add kehadiran -->
					<!-- Button trigger modal -->
					<div class="modal fade" id="modal-add-kehadiran"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Kehadiran</h4>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('admin/kehadiran/store'); ?>" method="post">
										<!-- periode hidden -->
										<input type="hidden" name="periode" value="<?= $periode->tanggal; ?>">
										<div class="form-group">
											<label for="user_id">Pegawai</label>
											<!-- select -->
											<select name="user_id" id="user_id" class="form-control">
												<option value="">-- Pilih Pegawai --</option>
												<?php foreach($pegawai as $p): ?>
													<option value="<?= $p->id; ?>"><?= $p->first_name .' '. $p->last_name; ?> - <?= $p->username ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<!-- catatan -->
										<p class="font-weight-bold">Catatan Kehadiran</p>
										<div class="row">
											<div class="col-3">
												<div class="form-group">
													<label for="hadir">Hadir</label>
													<input type="number" name="hadir" id="hadir" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tl">Terlambat</label>
													<input type="number" name="tl" id="tl" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="pa">Pulang Awal</label>
													<input type="number" name="pa" id="pa" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="ta">Tidak Absen</label>
													<input type="number" name="ta" id="ta" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tad">Tidak Absen Datang</label>
													<input type="number" name="tad" id="tad" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tap">Tidak Absen Pulang</label>
													<input type="number" name="tap" id="tap" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="izin">Izin</label>
													<input type="number" name="izin" id="izin" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="alpa">Alpa</label>
													<input type="number" name="alpa" id="alpa" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="alb">Alpa 1 Bulan</label>
													<input type="number" name="alb" id="alb" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="bs">Bolos</label>
													<input type="number" name="bs" id="bs" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="dn">Dinas Luar</label>
													<input type="number" name="dn" id="dn" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="sakit">Sakit</label>
													<input type="number" name="sakit" id="sakit" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="csa">Cuti Sakit (> 6 Hari)</label>
													<input type="number" name="csa" id="csa" class="form-control">
												</div>
											</div>

											
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
					<?php endif; ?>
					<?php if($this->session->userdata('id_role') == 3): ?>
						<a href="<?= base_url('petugas/tunjangan/show/'. $periode->tanggal); ?>" class="btn btn-info btn-sm">
						Lihat Tunjangan
					</a>
					<!-- kembali -->
					<a href="<?= base_url('petugas/kehadiran'); ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali
					</a>
					<?php endif; ?>

				</div>
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>H</th>
							<th>TL</th>
							<th>PA</th>
							<th>TA</th>
							<th>TAD</th>
							<th>TAP</th>
							<th>IZIN</th>
							<th>ALPA</th>
							<th>ALB</th>
							<th>BS</th>
							<th>DN</th>
							<th>SAKIT</th>
							<th>CSA</th>
						    <th class="text-center">Validasi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; 
						if(@$kehadiran) :
						?>
						
						<?php foreach ($kehadirans as $kehadiran) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $kehadiran->first_name .' '. $kehadiran->last_name?></td>
								<td><?= $kehadiran->hadir; ?></td>
								<td><?= $kehadiran->tl; ?></td>
								<td><?= $kehadiran->pa; ?></td>
								<td><?= $kehadiran->ta; ?></td>
								<td><?= $kehadiran->tad; ?></td>
								<td><?= $kehadiran->tap; ?></td>
								<td><?= $kehadiran->izin; ?></td>
								<td><?= $kehadiran->alpa; ?></td>
								<td><?= $kehadiran->alb; ?></td>
								<td><?= $kehadiran->bs; ?></td>
								<td><?= $kehadiran->dn; ?></td>
								<td><?= $kehadiran->sakit; ?></td>
								<td><?= $kehadiran->csa; ?></td>
							 	<td class="text-center">
								 	<?php if ($kehadiran->validasi == 1){?>
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-check text-success"></i></div>
									<?php } else { ?>
										<a href="
										<?php if($this->session->userdata('id_role') == 1): ?>
										<?=base_url('admin/kehadiran/validasi/').$kehadiran->id ?>
										<?php else: ?>
										<?=base_url('petugas/kehadiran/validasi/').$kehadiran->id ?>
										<?php endif; ?>
										" class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-hourglass-half"></i></a>
									<?php } ?>
								 </td>
								<td>
									<!-- modal edit kehadiran -->
									<?php if($this->session->userdata('id_role') == 1): ?>

									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-kehadiran<?= $kehadiran->id; ?>">
										<i class="fa fa-edit"></i> Edit
									</button>
									<?php endif; ?>
								</td>
							</tr>
						<?php $no++; ?>
						<div class="modal fade" id="modal-edit-kehadiran<?= $kehadiran->id; ?>"  tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content ">
									<div class="modal-header">
										<h4 class="modal-title">Edit kehadiran</h4>
									</div>
									<form action="<?= base_url('admin/kehadiran/update_kehadiran'); ?>" method="post">
										<div class="modal-body">
										<input type="hidden" name="id" value="<?= $kehadiran->id; ?>">
										<input type="hidden" name="periode" value="<?= $kehadiran->periode ?>"  >
										<div class="form-group">
											<label for="user_id">Pegawai</label>
											<!-- select -->
											<select name="user_id" id="user_id" class="form-control">
												<option value="">-- Pilih Pegawai --</option>
												<?php foreach($pegawai_all as $p): ?>
													<option value="<?= $p->id; ?>" <?php if($p->id == $kehadiran->user_id){echo 'selected'; } ?>><?= $p->first_name .' '. $p->last_name; ?> - <?= $p->username ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<!-- catatan -->
										<p class="font-weight-bold">Catatan Kehadiran</p>
										<div class="row">
											<div class="col-3">
												<div class="form-group">
													<label for="hadir">Hadir</label>
													<input type="number" value="<?= $kehadiran->hadir?>" name="hadir" id="hadir" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tl">Terlambat</label>
													<input type="number" value="<?= $kehadiran->tl?>" name="tl" id="tl" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="pa">Pulang Awal</label>
													<input type="number" value="<?= $kehadiran->pa?>" name="pa" id="pa" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="ta">Tidak Absen</label>
													<input type="number" value="<?= $kehadiran->ta?>" name="ta" id="ta" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tad">Tidak Absen Datang</label>
													<input type="number" value="<?= $kehadiran->tad?>" name="tad" id="tad" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="tap">Tidak Absen Pulang</label>
													<input type="number" value="<?= $kehadiran->tap?>" name="tap" id="tap" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="izin">Izin</label>
													<input type="number" value="<?= $kehadiran->izin?>" name="izin" id="izin" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="alpa">Alpa</label>
													<input type="number" value="<?= $kehadiran->alpa?>" name="alpa" id="alpa" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="alb">Alpa 1 Bulan</label>
													<input type="number" value="<?= $kehadiran->alb?>" name="alb" id="alb" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="bs">Bolos</label>
													<input type="number" value="<?= $kehadiran->bs?>" name="bs" id="bs" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="dn">Dinas Luar</label>
													<input type="number" value="<?= $kehadiran->dn?>" name="dn" id="dn" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="sakit">Sakit</label>
													<input type="number" value="<?= $kehadiran->sakit?>" name="sakit" id="sakit" class="form-control">
												</div>
											</div>
											<div class="col-3">
												<div class="form-group">
													<label for="csa">Cuti Sakit (> 6 Hari)</label>
													<input type="number" value="<?= $kehadiran->csa?>" name="csa" id="csa" class="form-control">
												</div>
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
						<?php endforeach; ?>
						<?php else: ?>
						<tr>
							<td colspan="17" class="text-center">Tidak ada data</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	// checkbox change validasi value save to database
	// $(document).ready(function() {
	// 	$('.validasi').change(function() {
	// 		// get value
	// 		var validasi = $(this).val();
	// 		// post to kehadiran
	// 		$.ajax({
	// 			url: '<?= base_url('admin/kehadiran/validasi') ?>',
	// 			type: 'POST',
	// 			data: {
	// 				validasi: validasi,
	// 				id: $(this).attr('data-id')
	// 			},
	// 			success: function(data) {
	// 				console.log(data);
	// 			}
	// 		});
	// 	});
	// });

	// function validasi
	function validasi(id) {
		// get value
		var validasi = $('#validasi-' + id).val();

		// post to kehadiran
		$.ajax({
			url: '<?= base_url('admin/kehadiran/validasi') ?>',
			type: 'POST',
			data: {
				validasi: validasi,
				id: id
			},
			success: function(data) {
				console.log(data);
			}
		});
	}


</script>



