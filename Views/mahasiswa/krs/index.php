<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h3 class="text-primary fw-bold"><i class="fas fa-edit"></i> Kartu Rencana Studi</h3>
        <p class="text-muted mb-0">Semester Ganjil 2024/2025</p>
    </div>
    <div class="text-end">
        <h4 class="mb-0 fw-bold text-success">Total: <?= $data['total_sks']; ?> SKS</h4>
        <small>Maksimal 24 SKS</small>
    </div>
</div>

<div class="alert alert-info border-0 shadow-sm">
    <i class="fas fa-info-circle me-2"></i> Silakan klik tombol <strong>"Tambah Kelas"</strong> untuk mengambil mata kuliah baru.
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Mata Kuliah yang Diambil</h6>
        <a href="<?= BASEURL; ?>/krs/create" class="btn btn-primary btn-sm rounded-pill px-4">
            <i class="fas fa-plus me-1"></i> Tambah Kelas
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen</th>
                        <th>Jadwal</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['krs'])) : ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3"></i><br>
                                Belum ada mata kuliah yang diambil.
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php $no=1; foreach($data['krs'] as $row) : ?>
                        <tr>
                            <td class="ps-4"><?= $no++; ?></td>
                            <td><span class="badge bg-secondary"><?= $row['kode_matkul']; ?></span></td>
                            <td class="fw-bold"><?= $row['nama_matkul']; ?></td>
                            <td><small><?= $row['nama_dosen']; ?></small></td>
                            <td>
                                <span class="badge bg-info text-dark"><?= $row['hari']; ?></span> 
                                <small><?= date('H:i', strtotime($row['jam_mulai'])); ?></small>
                            </td>
                            <td class="fw-bold text-center"><?= $row['sks']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/krs/delete/<?= $row['krs_id']; ?>" class="btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Batalkan mata kuliah ini?')">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>