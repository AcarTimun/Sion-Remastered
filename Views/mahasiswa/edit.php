<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-success fw-bold">Edit Data Mahasiswa</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/mahasiswa/update" method="POST">
                    
                    <input type="hidden" name="mahasiswa_id" value="<?= $data['mhs']['mahasiswa_id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">NIM (Tidak bisa diubah)</label>
                        <input type="text" class="form-control bg-light" value="<?= $data['mhs']['nim']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $data['mhs']['nama_mahasiswa']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Program Studi</label>
                            <select class="form-select" name="prodi" required>
                                <?php 
                                    $prodi = ['Sistem Informasi', 'Teknologi Informasi', 'Sistem Komputer'];
                                    foreach($prodi as $p) : 
                                ?>
                                    <option value="<?= $p; ?>" <?= ($data['mhs']['prodi'] == $p) ? 'selected' : ''; ?>><?= $p; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Angkatan</label>
                            <input type="number" class="form-control" name="angkatan" value="<?= $data['mhs']['angkatan']; ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>