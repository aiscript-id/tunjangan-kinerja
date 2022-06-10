<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header with-border">
				<h3 class="card-title">Data Tunjangan</h3>
                <!-- nutton back -->
                <div class="text-right">

                    <a href="<?= base_url('admin/tunjangan/show/'.$tunjangan->periode) ?>" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
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
                <h4 class="card-title">Hasil Penilaian</h4><br><hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th rowspan="8">Hasil Kerja</th>
                            <th rowspan="4">Kualitas</th>
                            <td>Output pekerjaan memberikan kepuasan kepada pemangku kepentingan internal dan eksternal</td>
                            <td><?= $penilaian->kualitas_a ?></td>
                        </tr>
                        <tr>
                            <td>Kesesuaian pekerjaan dengan jabatan</td>
                            <td><?= $penilaian->kualitas_b ?></td>
                        </tr>
                        <tr>
                            <td>Output pekerjaan inovatif ( sesuai perkembangan terbaru)</td>
                            <td><?= $penilaian->kualitas_c ?></td>

                        </tr>
                        <tr>
                            <td>Output pekerjaan  sesuai dengan SKP</td>
                            <td><?= $penilaian->kualitas_d ?></td>

                        </tr>
                        <tr>
                            <th rowspan="2">Ketepatan</th>
                            <td>Output pekerjaan  sesuai dengan Permintaan</td>
                            <td><?= $penilaian->ketepatan_a ?></td>
                        </tr>
                        <tr>
                            <td>Menyelesaikan pekerjaan sesuai dengan Standard Operating Procedure (SOP) atau Standar Operasional dan Tata Kerja (SOTK) instansi</td>
                            <td><?= $penilaian->ketepatan_b ?></td>
                        </tr>
                        <tr>
                            <th rowspan="2">Kuantitas</th>
                            <td>Menyelesaikan pekerjaan sesuai dengan jumlah yang diminta</td>
                            <td><?= $penilaian->kuantitas_a ?></td>
                        </tr>
                        <tr>
                            <td>Menyelesaikan seluruh pekerjaan secara efisien ( tepat waktu, tepat sumber daya, tepat pembiayaan)</td>
                            <td><?= $penilaian->kuantitas_b ?></td>
                        </tr>

                        <tr>
                            <th rowspan="5">Perilaku</th>
                            <th>Orientasi Pelayanan</th>
                            <td>sikap dan prilaku dalam memberikan pelayanan</td>
                            <td><?= $penilaian->pelayanan ?></td>
                        </tr>

                        <tr>
                            <th>Integritas</th>
                            <td>Bertindak sesuai nilai, norma dan etika organisasi</td>
                            <td><?= $penilaian->integritas ?></td>
                        </tr>
                        <tr>
                            <th>Komitmen</th>
                            <td>kemauan dan kemampuan untuk menyelaraskan sikap dan tindakan untuk tujuan organisasi dengan mengutamakan kepentingan kedinasan dari pada kepentingan diri sendiri, seseorang dan / atau golongan</td>
                            <td><?= $penilaian->komitmen ?></td>
                        </tr>
                        <tr>
                            <th>Disiplin</th>
                            <td>Kesanggupan untuk menaati kewajiban dan menghindari larangan yang ditentukan dalam peraturan perundang-undangan dan / atau peraturan kedinasan</td>
                            <td><?= $penilaian->disiplin ?></td>
                        </tr>
                        <tr>
                            <th>Kerjasama</th>
                            <td>kemauan dan kemampuan untuk bekerjasama dengan rekan kerja, atasan, bawahan dalam unit kerjanya serta instansi lain.</td>
                            <td><?= $penilaian->kerjasama ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Total Penilaian</th>
                            <td><?= $tunjangan->penilaian ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>