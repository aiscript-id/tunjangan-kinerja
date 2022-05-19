<div class="row">
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Identitas Diri</h4>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">NIP</dt>
                    <dd class="col-sm-8"><?= $user->username ?></dd>
                    <dt class="col-sm-4">Nama</dt>
                    <dd class="col-sm-8"><?= $user->first_name .' '. $user->last_name ?></dd>
                    <dt class="col-sm-4">Jenis Kelamin</dt>
                    <dd class="col-sm-8"><?= jk($user->jk) ?></dd>
                    <dt class="col-sm-4">Tempat Tanggal Lahir</dt>
                    <dd class="col-sm-8"><?= $user->ttl ?></dd>
                    <dt class="col-sm-4">Jabatan</dt>
                    <dd class="col-sm-8"><?= $user->jabatan ?></dd>
                    <dt class="col-sm-4">Pendidikan</dt>
                    <dd class="col-sm-8"><?= $user->pendidikan ?></dd>
                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8"><?= $user->alamat ?></dd>
                    <dt class="col-sm-4">Besar Tunjangan</dt>
                    <dd class="col-sm-8"><?= rupiah($user->tunjangan) ?></dd>
                    <!-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> -->
                </dl>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card card-<?php if(@$tunjangan->tanggal_terima == null) {echo 'warning';} else {echo 'success'; }  ?>">
            <div class="card-header">
                <h4 class="card-title">Tunjangan Kinerja</h4>
            </div>
            <div class="card-body">
                <?php if (@$tunjangan) : ?>
                    <div class="text-center">
                        <p class="card-text"><?= $tunjangan->name_periode ?></p>
                        <p class="text-sm mb-0">Status Tunjangan</p>
                        <?php if ($tunjangan->tanggal_terima == null or $tunjangan->tanggal_terima == '0000-00-00') : ?>
                            <p class="badge badge-warning">Belum Diterima</p>
                        <?php else : ?>
                            <p class="badge badge-success">Sudah Diterima pada <?= tgl_indo_full($tunjangan->tanggal_terima) ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($tunjangan->validasi == 1): ?>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-3">Potongan</dt>
                            <dd class="col-sm-9"><?= $tunjangan->total_potongan ?> %</dd>
                            <dt class="col-sm-3">Tunjangan</dt>
                            <dd class="col-sm-9"><?= rupiah($tunjangan->total_tunjangan) ?></dd>
                        </dl>
                        <?php if ($tunjangan->verifikasi != null && $tunjangan->tanggal_terima == null): ?>
                            <!-- btn terima -->
                            <hr>
                            <small>Apakah anda telah menerima tunjangan ?</small>
                            <a href="<?= base_url('pegawai/tunjangan/terima/' . $tunjangan->id) ?>" class="btn btn-success btn-sm btn-block"
                            onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi penerimaan tunjangan ini?')">Ya, Tunjangan telah diterima</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <p class="text-sm text-center m-4"><i>Tunjangan sedang divalidasi. Perhitungan total tunjangan berdasarkan pada data kehadiran.</i></p>
                    <?php endif; ?>

                    <hr>
                    <dl class="row">
                        <dt class="col-sm-3">Dari</dt>
                        <dd class="col-sm-3"><?= tgl_indo_full($tunjangan->awal) ?></dd>
                        <dt class="col-sm-3">Sampai</dt>
                        <dd class="col-sm-3"><?= tgl_indo_full($tunjangan->akhir) ?></dd>
                        <!-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> -->
                    </dl>
                <?php else: ?>
                    <p class="card-text">Belum ada tunjangan kinerja</p>
                <?php endif ?>
                </div>
        </div>
    </div>
</div>
