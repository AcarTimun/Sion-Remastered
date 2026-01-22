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

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-5">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-chalkboard-teacher fa-lg"></i>
                </div>
                <h5 class="card-title text-primary fw-bold">Data Dosen</h5>
                <p class="card-text text-muted small">Kelola data dosen pengajar & NIDN.</p>
                <a href="<?= BASEURL; ?>/dosen" class="btn btn-outline-primary btn-sm rounded-pill px-4">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-5">
                <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-user-graduate fa-lg"></i>
                </div>
                <h5 class="card-title text-success fw-bold">Data Mahasiswa</h5>
                <p class="card-text text-muted small">Kelola data mahasiswa & Prodi.</p>
                <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-outline-success btn-sm rounded-pill px-4">Kelola</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-5">
                <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-book fa-lg"></i>
                </div>
                <h5 class="card-title text-warning fw-bold">Mata Kuliah</h5>
                <p class="card-text text-muted small">Kelola kurikulum & SKS.</p>
                <a href="<?= BASEURL; ?>/matkul" class="btn btn-outline-warning btn-sm rounded-pill px-4">Kelola</a>
            </div>
        </div>
    </div>
</div>