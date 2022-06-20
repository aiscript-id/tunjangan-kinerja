<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pegawai</span>
                <span class="info-box-number">
                    <?= $this->db->count_all_results('tbl_user'); ?>
                </span>
            </div>

        </div>

    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jabatan</span>
                <span class="info-box-number">
                    <?= $this->db->count_all_results('jabatan'); ?>
                </span>
            </div>
        </div>
    </div>


    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Periode Tunjangan</span>
                <span class="info-box-number">
                    <?= $this->db->count_all_results('periode_tunjangan'); ?>
                </span>
            </div>

        </div>

    </div>
    <?php
    // last periode
    $periode = $this->db->order_by('id', 'desc')->get('periode_tunjangan')->row();
    ?>

    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-8">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Presensi Kehadiran <?= $periode->tanggal ?></span>
                <span class="info-box-number">
                    <?php
                        $kehadiran = $this->db->where('periode', $periode->tanggal)->get('kehadiran')->result();
                        $total = 0;
                        $key = 0;
                        $sakit = 0; $izin = 0; $alpha = 0;
                        foreach ($kehadiran as $value) {
                            $total = $total + (100 - $value->potongan);
                            $key++;
                            $sakit = $sakit + $value->sakit;
                            $izin = $izin + $value->izin;
                            $alpha = $alpha + $value->alpa;
                        }

                        $persentase = $total / $key;
                        $persentase = number_format($persentase, 2, ',', '.');
                    ?>
                   <!-- <?= $persentase ?>% -->
                   <div class="row">
                    <div class="col-md-4">
                        Sakit : 
                        <span class="badge badge-danger"><?= $sakit ?></span>
                        
                    </div>
                    <div class="col-md-4">
                        Izin : 
                        <span class="badge badge-warning"><?= $izin ?></span>
                    </div>
                    <div class="col-md-4">
                        Alfa :
                        <span class="badge badge-secondary"><?= $alpha ?></span>
                    </div>
                   </div>
                </span>
            </div>

        </div>

    </div>

    <!-- <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
            </div>

        </div>

    </div> -->

</div>