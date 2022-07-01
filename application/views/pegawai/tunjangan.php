<!-- button tambah tunjangan -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Tunjangan</h3>
				<!-- button add -->
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Tunjangan</th>
							<th>Jumlah Tunjangan</th>
							<th>Potongan</th>
							<th>Total</th>
							<th class="text-center">Validasi</th>
							<th>Tanggal Terima</th>
						</tr>
					</thead>
					<tbody>
						<?php if(count($tunjangans) > 0) : ?>
						<?php $no = 1; ?>
						<?php foreach ($tunjangans as $tunjangan) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $tunjangan->name_periode ?></td>
								<td><?= rupiah($tunjangan->tunjangan); ?></td>
								<td><?= $tunjangan->total_potongan; ?> %</td>
								<td><?= rupiah($tunjangan->total_tunjangan); ?></td>
								<td class="text-center">
								<?php if ($tunjangan->validasi == 1){?>
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-check text-success"></i></div>
									<?php } else { ?>
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-hourglass-half text-secondary"></i></div>
									<?php } ?>
								</td>
								<td>
									<?php if($tunjangan->tanggal_terima == null) : ?>
										<a href="<?= base_url('pegawai/tunjangan/terima/'.$tunjangan->id) ?>" class="btn btn-success btn-sm">Terima</a>
									<?php else : ?>
										<?= tgl_indo($tunjangan->tanggal_terima) ?>
									<?php endif; ?>
								</td>
							</tr>
						<?php $no++; ?>
						<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="7" class="text-center">Tidak ada data. <br> Silahkan klik tombol <b>Cek Kehadiran</b> untuk mendapatkan data perhitungan tunjangan. <br> Pastikan data kehadiran pada periode yang sama telah diverifikasi</td>
							</tr>
						<?php endif ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



