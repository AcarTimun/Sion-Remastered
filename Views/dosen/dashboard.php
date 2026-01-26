<div class="row mb-4">
    <div class="col-md-12">
        <div class="alert alert-info border-0 shadow-sm d-flex align-items-center" role="alert">
            <i class="fas fa-chalkboard-teacher fa-2x me-3"></i>
            <div>
                <h4 class="alert-heading mb-1">Selamat Datang, Bapak/Ibu Dosen!</h4>
                <p class="mb-0">Selamat datang di Sistem Informasi Online (Sion). Silakan cek jadwal mengajar Anda hari ini.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-5">
                <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </div>
                <h5 class="card-title text-info fw-bold">Jadwal Mengajar</h5>
                <p class="card-text text-muted small">Lihat jadwal kelas Anda.</p>
                <a href="<?= BASEURL; ?>/portaldosen/nilai" class="btn btn-outline-info btn-sm rounded-pill px-4">Lihat Jadwal</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-5">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-pen-alt fa-lg"></i>
                </div>
                <h5 class="card-title text-primary fw-bold">Input Nilai</h5>
                <p class="card-text text-muted small">Input nilai UTS, UAS, dan Tugas.</p>
                <a href="<?= BASEURL; ?>/portaldosen/nilai" class="btn btn-outline-primary btn-sm rounded-pill px-4">Input Nilai</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu" style="opacity: 0.6;">
            <div class="card-body text-center py-5">
                <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <h5 class="card-title text-secondary fw-bold">Perwalian</h5>
                <p class="card-text text-muted small">Validasi KRS mahasiswa bimbingan.</p>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-4 disabled">Segera Hadir</button>
            </div>
        </div>
    </div>
</div>