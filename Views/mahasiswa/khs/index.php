<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="text-primary fw-bold"><i class="fas fa-star"></i> Kartu Hasil Studi</h3>
        <p class="text-muted mb-0">Laporan Nilai Akademik</p>
    </div>
    <div class="text-end">
        <h1 class="display-4 fw-bold text-success mb-0"><?= $data['ipk']; ?></h1>
        <small class="text-muted fw-bold">Indeks Prestasi (IPK)</small>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th class="text-center">SKS</th>
                        <th class="text-center">Nilai Akhir</th>
                        <th class="text-center">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['khs'])) : ?>
                        <tr><td colspan="6" class="text-center py-4">Belum ada nilai yang masuk.</td></tr>
                    <?php else : ?>
                        <?php $no=1; foreach($data['khs'] as $row) : ?>
                        <tr>
                            <td class="ps-4"><?= $no++; ?></td>
                            <td><?= $row['kode_matkul']; ?></td>
                            <td class="fw-bold"><?= $row['nama_matkul']; ?></td>
                            <td class="text-center"><?= $row['sks']; ?></td>
                            <td class="text-center"><?= $row['nilai_akhir']; ?></td>
                            <td class="text-center fw-bold fs-5 
                                <?= ($row['grade'] == 'A') ? 'text-success' : 
                                   (($row['grade'] == 'E' || $row['grade'] == '-') ? 'text-danger' : 'text-dark'); ?>">
                                <?= $row['grade']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>