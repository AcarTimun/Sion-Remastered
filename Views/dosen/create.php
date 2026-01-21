<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-primary fw-bold">Tambah Data Dosen</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/dosen/store" method="POST">
                    
                    <div class="mb-3">
                        <label for="nidn" class="form-label">NIDN (Nomor Induk Dosen Nasional)</label>
                        <input type="number" class="form-control" id="nidn" name="nidn" required placeholder="Contoh: 08012345">
                        <div class="form-text">NIDN akan digunakan sebagai <strong>Username</strong> login.</div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_dosen" class="form-label">Nama Lengkap & Gelar</label>
                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required placeholder="Contoh: Dr. Budi Santoso, M.Kom">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Aktif</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="dosen@stikom-bali.ac.id">
                    </div>

                    <div class="alert alert-warning small">
                        <i class="fas fa-key"></i> <strong>Info Keamanan:</strong><br>
                        Password default untuk akun baru adalah: <strong>123</strong>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/dosen" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>