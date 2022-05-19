<!-- button tambah kehadiran -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Kehadiran</h3>
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-striped is-narrow">
					<thead>
						<tr>
							<th>No</th>
							<th>Periode</th>
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
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($kehadirans as $kehadiran) : ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $kehadiran->periode?></td>
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
										<div class="btn btn-sm btn-white btn-circle" title="Validasi"><i class="fa fa-hourglass-half text-secondary"></i></div>
									<?php } ?>
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



