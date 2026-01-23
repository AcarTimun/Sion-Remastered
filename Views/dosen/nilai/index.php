<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-primary fw-bold"><i class="fas fa-pen-alt"></i> Input Nilai Mahasiswa</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <?php if(empty($data['kelas_ajar'])) : ?>
            <div class="alert alert-warning">Anda belum memiliki jadwal mengajar.</div>
        <?php else : ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kode Kelas</th>
                            <th>Mata Kuliah</th>
                            <th>Jadwal</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['kelas_ajar'] as $kls) : ?>
                        <tr>
                            <td><span class="badge bg-dark"><?= $kls['kode_kelas']; ?></span></td>
                            <td class="fw-bold"><?= $kls['nama_matkul']; ?></td>
                            <td><?= $kls['hari']; ?>, <?= date('H:i', strtotime($kls['jam_mulai'])); ?></td>
                            <td><?= $kls['sks']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/portaldosen/input_nilai/<?= $kls['kelas_id']; ?>" class="btn btn-primary btn-sm rounded-pill px-4">
                                    <i class="fas fa-edit me-1"></i> Input Nilai
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>