<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-primary fw-bold">Edit Jadwal Kelas</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/kelas/update" method="POST">
                    
                    <input type="hidden" name="kelas_id" value="<?= $data['kelas']['kelas_id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="matkul_id" required>
                            <?php foreach($data['matkul'] as $m) : ?>
                                <option value="<?= $m['matkul_id']; ?>" <?= ($m['matkul_id'] == $data['kelas']['matkul_id']) ? 'selected' : ''; ?>>
                                    <?= $m['nama_matkul']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen Pengajar</label>
                        <select class="form-select" name="dosen_id" required>
                            <?php foreach($data['dosen'] as $d) : ?>
                                <option value="<?= $d['dosen_id']; ?>" <?= ($d['dosen_id'] == $data['kelas']['dosen_id']) ? 'selected' : ''; ?>>
                                    <?= $d['nama_dosen']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kode Kelas</label>
                            <input type="text" class="form-control" name="kode_kelas" value="<?= $data['kelas']['kode_kelas']; ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kapasitas</label>
                            <input type="number" class="form-control" name="kapasitas" value="<?= $data['kelas']['kapasitas']; ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Hari</label>
                            <select class="form-select" name="hari" required>
                                <?php 
                                    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                    foreach($days as $day) : 
                                ?>
                                    <option value="<?= $day; ?>" <?= ($data['kelas']['hari'] == $day) ? 'selected' : ''; ?>><?= $day; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" class="form-control" name="jam_mulai" value="<?= $data['kelas']['jam_mulai']; ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" class="form-control" name="jam_selesai" value="<?= $data['kelas']['jam_selesai']; ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/kelas" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>