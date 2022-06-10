<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
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

    <div class="col-12 col-sm-6 col-md-3">
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
    <div class="col-12 col-sm-6 col-md-3">
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