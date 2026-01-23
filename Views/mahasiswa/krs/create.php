<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold"><i class="fas fa-shopping-cart"></i> Pilih Mata Kuliah</h3>
    <a href="<?= BASEURL; ?>/krs" class="btn btn-secondary rounded-pill">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke KRS
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kode Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Jadwal</th>
                        <th>Sisa Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['kelas_tersedia'] as $kls) : ?>
                    <tr>
                        <td><span class="badge bg-dark"><?= $kls['kode_kelas']; ?></span></td>
                        <td>
                            <strong><?= $kls['nama_matkul']; ?></strong><br>
                            <small class="text-muted">Smt <?= $kls['semester_peruntukan']; ?></small>
                        </td>
                        <td class="fw-bold text-center"><?= $kls['sks']; ?></td>
                        <td><?= $kls['nama_dosen']; ?></td>
                        <td>
                            <?= $kls['hari']; ?><br>
                            <small><?= date('H:i', strtotime($kls['jam_mulai'])); ?> - <?= date('H:i', strtotime($kls['jam_selesai'])); ?></small>
                        </td>
                        <td>
                            <span class="badge bg-success">Avail</span>
                        </td>
                        <td>
                            <a href="<?= BASEURL; ?>/krs/store/<?= $kls['kelas_id']; ?>" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fas fa-plus"></i> Ambil
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>