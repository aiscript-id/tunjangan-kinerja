<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Tunjangan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: &nbsp; <?= $tunjangan->first_name .' '. $tunjangan->last_name ?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>: &nbsp; <?= $tunjangan->username ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: &nbsp; <?= $tunjangan->jabatan ?></td>
                            </tr>
                            <tr>
                                <td>Tunjangan</td>
                                <td>: &nbsp; <?= $periode->periode ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Penilaian</h4><br><hr>
                <form action="<?= base_url('admin/tunjangan/submit_penilaian/'.$tunjangan->id) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Kualitas</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Output pekerjaan memberikan kepuasan kepada pemangku kepentingan internal dan eksternal</label>
                            <input type="number" name="kualitas_a" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Kesesuaian pekerjaan dengan jabatan</label>
                            <input type="number" name="kualitas_b" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Output pekerjaan inovatif ( sesuai perkembangan terbaru)</label>
                            <input type="number" name="kualitas_c" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Output pekerjaan  sesuai dengan SKP</label>
                            <input type="number" name="kualitas_d" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Ketepatan</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Output pekerjaan  sesuai dengan Permintaan</label>
                            <input type="number" name="ketepatan_a" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Menyelesaikan pekerjaan sesuai dengan Standard Operating Procedure (SOP) atau Standar Operasional dan Tata Kerja (SOTK) instansi</label>
                            <input type="number" name="ketepatan_b" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Kuantitas</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Menyelesaikan pekerjaan sesuai dengan jumlah yang diminta</label>
                            <input type="number" name="kuantitas_a" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Menyelesaikan seluruh pekerjaan secara efisien ( tepat waktu, tepat sumber daya, tepat pembiayaan)</label>
                            <input type="number" name="kuantitas_b" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <!-- title -->
                        <h6 class="font-weight-bold">Orientasi Pelayanan</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">sikap dan prilaku dalam memberikan pelayanan</label>
                            <input type="number" name="pelayanan" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Integritas</h6>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Bertindak sesuai nilai, norma dan etika organisasi</label>
                            <input type="number" name="integritas" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Komitmen</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">kemauan dan kemampuan untuk menyelaraskan sikap dan tindakan untuk tujuan organisasi dengan mengutamakan kepentingan kedinasan dari pada kepentingan diri sendiri, seseorang dan / atau golongan</label>
                            <input type="number" name="komitmen" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Disiplin</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">Kesanggupan untuk menaati kewajiban dan menghindari larangan yang ditentukan dalam peraturan perundang-undangan dan / atau peraturan kedinasan</label>
                            <input type="number" name="disiplin" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- title -->
                        <h6 class="font-weight-bold">Kerjasama</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="text-sm font-weight-normal">kemauan dan kemampuan untuk bekerjasama dengan rekan kerja, atasan, bawahan dalam unit kerjanya serta instansi lain.</label>
                            <input type="number" name="kerjasama" class="form-control" value="" min="0" max="100" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <!-- submit button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>