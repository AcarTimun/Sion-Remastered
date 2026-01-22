<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-success fw-bold">Tambah Data Mahasiswa</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="number" class="form-control" name="nim" required placeholder="Contoh: 24001">
                        <div class="form-text">NIM akan digunakan sebagai Username login. Password default: <strong>123</strong></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" required placeholder="Nama Lengkap">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Program Studi</label>
                            <select class="form-select" name="prodi" required>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Sistem Komputer">Sistem Komputer</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Angkatan</label>
                            <input type="number" class="form-control" name="angkatan" value="<?= date('Y'); ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>