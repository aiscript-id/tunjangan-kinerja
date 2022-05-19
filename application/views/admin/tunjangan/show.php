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
				<table id="datatable" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Jumlah Tunjangan</th>
							<th>Potongan</th>
							<th>Total</th>
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
								<td><?= rupiah($tunjangan->total_tunjangan); ?></td>
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
						<?php $no++; ?>
						<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="6" class="text-center">Tidak ada data. <br> Silahkan klik tombol <b>Cek Kehadiran</b> untuk mendapatkan data perhitungan tunjangan. <br> Pastikan data kehadiran pada periode yang sama telah diverifikasi</td>
							</tr>
						<?php endif ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



