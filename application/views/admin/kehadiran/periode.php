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
		</div>

		<!-- foreach card tunjangan periode -->
		<?php foreach ($periode as $per): ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<p class="mb-0"><?= $per->periode; ?></p>
							<p>Periode : <?= $per->tanggal; ?> </p>

							
						</div>
						<div class="col-md-4">
<!-- button edit -->		<div class="text-right">
	<!-- verifikasi -->
								
								<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-periode<?= $per->id; ?>">
									<i class="fa fa-edit"></i> Edit
								</button>

							</div>

							<!-- modal edit -->
							<!-- Modal -->
							<div class="modal fade" id="modal-edit-periode<?= $per->id; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Periode Kehadiran</h4>
										</div>
										<div class="modal-body">
											<form action="<?= base_url('admin/kehadiran/periodeUpdate/'.$per->id); ?>" method="post">

												<div class="form-group">
													<label for="">Nama Periode</label>
													<input type="text" name="periode" class="form-control" value="<?= $per->periode; ?>" placeholder="Periode" required>
													<!-- alert -->
													<?= form_error('periode', '<small class="text-danger">', '</small>') ?>
												</div>

												<div class="form-group">
													<label for="">Periode</label>
													<!-- select $date -->
													<select name="tanggal" class="form-control" required disabled>
														<option value="">Pilih Periode</option>
														<?php foreach ($date as $key => $value): ?>
															<option value="<?= $value; ?>" <?= $value == $per->tanggal? 'selected' : ''; ?>><?= $value; ?></option>
														<?php endforeach ?>
													</select>
													<?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
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
				</div>
			</div>
			<!-- endforeach -->
			<?php endforeach; ?>
	</div>
</div>



