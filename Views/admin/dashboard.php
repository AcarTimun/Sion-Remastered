<div class="row mb-4">
    <div class="col-md-12">
        <div class="alert alert-primary border-0 shadow-sm d-flex align-items-center" role="alert">
            <i class="fas fa-info-circle fa-2x me-3"></i>
            <div>
                <h4 class="alert-heading mb-1">Selamat Datang di Dashboard Admin!</h4>
                <p class="mb-0">Anda telah login sebagai Administrator. Silakan kelola data akademik melalui menu di bawah ini.</p>
            </div>
        </div>
    </div>
</div>

<h5 class="mb-3 text-muted fw-bold"><i class="fas fa-database me-2"></i>Data Master</h5>
<div class="row mb-4">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-chalkboard-teacher fa-lg"></i>
                </div>
                <h6 class="fw-bold text-primary">Data Dosen</h6>
                <p class="small text-muted">Kelola data pengajar</p>
                <a href="<?= BASEURL; ?>/dosen" class="btn btn-outline-primary btn-sm rounded-pill w-100 mt-2">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-user-graduate fa-lg"></i>
                </div>
                <h6 class="fw-bold text-success">Data Mahasiswa</h6>
                <p class="small text-muted">Kelola data mahasiswa</p>
                <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-outline-success btn-sm rounded-pill w-100 mt-2">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-book fa-lg"></i>
                </div>
                <h6 class="fw-bold text-warning">Mata Kuliah</h6>
                <p class="small text-muted">Kelola kurikulum</p>
                <a href="<?= BASEURL; ?>/matkul" class="btn btn-outline-warning btn-sm rounded-pill w-100 mt-2">Kelola</a>
            </div>
        </div>
    </div>
</div>

<h5 class="mb-3 text-muted fw-bold"><i class="fas fa-cogs me-2"></i>Operasional Akademik</h5>
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </div>
                <h6 class="fw-bold text-info">Jadwal Kelas</h6>
                <p class="small text-muted">Atur jadwal perkuliahan & Dosen pengajar</p>
                <a href="<?= BASEURL; ?>/kelas" class="btn btn-outline-info btn-sm rounded-pill w-100 mt-2">Atur Jadwal</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-wallet fa-lg"></i>
                </div>
                <h6 class="fw-bold text-danger">Keuangan / Tagihan</h6>
                <p class="small text-muted">Buat tagihan SPP & Validasi bukti bayar</p>
                <a href="<?= BASEURL; ?>/keuangan" class="btn btn-outline-danger btn-sm rounded-pill w-100 mt-2">Kelola Keuangan</a>
            </div>
        </div>
    </div>
</div>