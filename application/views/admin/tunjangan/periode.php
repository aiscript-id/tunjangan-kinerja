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
		<div class="alert alert-primary" role="alert">
		  <!-- <h6 class="alert-heading text-bold"></h6> -->
		  	<p class="mb-0">
				<?php if($this->session->userdata('id_role') == 1): ?>
			  	Silahkan buat periode kehadiran dan tunjangan pada Menu 
			  	<a href="<?= base_url('admin/kehadiran/') ?>" class="text-bold text-decoration-none">Kehadiran</a> 
				  <br>
				<?php endif; ?>
				  Pastikan data tunjangan telah divalidasi untuk bisa melakukan verifikasi pada periode yang telah dibuat.
			</p>
		</div>
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Periode Tunjangan</h3>
				<!-- button add -->
				<div class="pull-right">
				</div>
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
								<th>Tervalidasi</th>
								<th>Total Tunjangan</th>
								<th class="text-center">Verifikasi</th>
								<th class="text-center">Validasi Kepala Balai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($periode as $value => $per): ?>
							<?php
								$validasi = $this->db->get_where('tunjangan', ['periode' => $per->tanggal, 'validasi' => 1])->num_rows();
							?>
							<tr>
								<td><?= $value+1 ?></td>
								<!-- <td><?= $per->periode; ?></td> -->
								<td class="text-center"><?= $per->tanggal; ?></td>
								<td><?= $validasi ?></td>
								<td>
									<?php
										$total = $this->db->query("SELECT SUM(total_tunjangan) AS total FROM tunjangan WHERE periode = '$per->tanggal'")->row();
										echo "Rp. ".number_format($total->total, 0, ',', '.');
										?>
								</td>
								<td class="text-center">
									<?php if ($per->verifikasi == null or $per->verifikasi == '0000-00-00'): ?>
										<span class="badge badge-danger">Belum</span>
										<?php else: ?>
											<p class="mb-0"> <?= tgl_indo($per->verifikasi) ?></p>
									<?php endif ?>
								</td>
								<td class="text-center">
									<?php if ($per->ttd == null or $per->ttd == '0000-00-00'): ?>
										<span class="badge badge-danger">Belum</span>
										<!-- verifikasi periode -->
										<?php if ($this->session->userdata('id_role') == 2): ?>
											<br>
											<a href="<?= base_url('kepala/tunjangan/ttd/'.$per->tanggal) ?>" class="mt-2 btn btn-outline-success btn-sm">
												<i class="fa fa-check"></i> Validasi Kepala Balai

											</a>
										<?php endif ?>
										<?php else: ?>
											<p class="mb-0"> <?= tgl_indo($per->ttd) ?></p>
									<?php endif ?>
								</td>
								<td>
									<!-- input kehadiran -->
									<a href="
										<?php if($this->session->userdata('id_role') == 1): ?>
											<?= base_url('admin/tunjangan/show/'.$per->tanggal) ?>
										<?php elseif($this->session->userdata('id_role') == 3): ?>
											<?= base_url('petugas/tunjangan/show/'.$per->tanggal) ?>
										<?php elseif($this->session->userdata('id_role') == 2): ?>
											<?= base_url('kepala/tunjangan/show/'.$per->tanggal) ?>
										<?php endif; ?>
									" class="btn btn-primary btn-sm">
										<i class="fa fa-list"></i> Detail Tunjangan
									</a>
									<!-- rekap bulanan -->
									<a href="<?= base_url('export/rekap_excel/'.$per->tanggal) ?>" class="btn btn-success btn-sm">
										<i class="fa fa-file-excel-o"></i> Rekap Bulanan
									</a>

									<!-- verifikasi periode -->
									<?php if ($per->verifikasi == 0 && $this->session->userdata('id_role') == 1): ?>
										<a href="<?= base_url('admin/tunjangan/verifikasi/'.$per->tanggal) ?>" class="btn btn-success btn-sm">
											<i class="fa fa-check"></i> Verifikasi
										</a>
									<?php endif ?>

									

								</td>
							</tr>
							<!-- end modal edit -->
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>



