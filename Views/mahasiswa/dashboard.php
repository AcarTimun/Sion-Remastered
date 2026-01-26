<div class="row mb-4">
    <div class="col-md-12">
        <div class="alert alert-success border-0 shadow-sm d-flex align-items-center" role="alert">
            <i class="fas fa-user-graduate fa-2x me-3"></i>
            <div>
                <h4 class="alert-heading mb-1">Halo, <?= $_SESSION['user']['username']; ?>!</h4>
                <p class="mb-0">Selamat datang di Portal Mahasiswa. Jangan lupa cek tagihan sebelum mengisi KRS ya.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-edit fa-lg"></i>
                </div>
                <h6 class="fw-bold">Isi KRS</h6>
                <a href="<?= BASEURL; ?>/krs" class="btn btn-outline-primary btn-sm rounded-pill w-100 mt-2">Ambil Kelas</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </div>
                <h6 class="fw-bold">Jadwal Kuliah</h6>
                <a href="<?= BASEURL; ?>/krs" class="btn btn-outline-info btn-sm rounded-pill w-100 mt-2">Lihat Jadwal</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-star fa-lg"></i>
                </div>
                <h6 class="fw-bold">Kartu Hasil Studi</h6>
                <a href="<?= BASEURL; ?>/portalmahasiswa/khs" class="btn btn-outline-warning btn-sm rounded-pill w-100 mt-2">Lihat Nilai</a>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm h-100 card-menu">
            <div class="card-body text-center py-4">
                <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-wallet fa-lg"></i>
                </div>
                <h6 class="fw-bold">Keuangan</h6>
                <a href="<?= BASEURL; ?>/portalmahasiswa/keuangan" class="btn btn-outline-danger btn-sm rounded-pill w-100 mt-2">Cek Tagihan</a>
            </div>
        </div>
    </div>
</div>