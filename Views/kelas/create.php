<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-primary fw-bold">Buka Kelas Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/kelas/store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="matkul_id" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            <?php foreach($data['matkul'] as $m) : ?>
                                <option value="<?= $m['matkul_id']; ?>">
                                    <?= $m['nama_matkul']; ?> (Smt <?= $m['semester_peruntukan']; ?> - <?= $m['sks']; ?> SKS)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen Pengajar</label>
                        <select class="form-select" name="dosen_id" required>
                            <option value="">-- Pilih Dosen --</option>
                            <?php foreach($data['dosen'] as $d) : ?>
                                <option value="<?= $d['dosen_id']; ?>"><?= $d['nama_dosen']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kode Kelas</label>
                            <input type="text" class="form-control" name="kode_kelas" placeholder="Cth: AB101" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kapasitas Mahasiswa</label>
                            <input type="number" class="form-control" name="kapasitas" value="40" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Hari</label>
                            <select class="form-select" name="hari" required>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_mulai" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/kelas" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>