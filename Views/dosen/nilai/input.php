<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h4 class="text-primary fw-bold mb-0">Input Nilai: <?= $data['info_kelas']['kode_kelas']; ?></h4>
        <small class="text-muted">Pastikan data yang diinput sudah benar sebelum disimpan.</small>
    </div>
    <a href="<?= BASEURL; ?>/portaldosen/nilai" class="btn btn-secondary rounded-pill btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="<?= BASEURL; ?>/portaldosen/store_nilai" method="POST">
            
            <input type="hidden" name="kelas_id" value="<?= $data['info_kelas']['kelas_id']; ?>">

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="bg-light text-center">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">NIM</th>
                            <th style="width: 25%;">Nama Mahasiswa</th>
                            <th style="width: 15%;">Tugas (30%)</th>
                            <th style="width: 15%;">UTS (30%)</th>
                            <th style="width: 15%;">UAS (40%)</th>
                            <th style="width: 10%;">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($data['peserta'] as $mhs) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $mhs['nim']; ?></td>
                            <td class="fw-bold"><?= $mhs['nama_mahasiswa']; ?></td>
                            
                            <td>
                                <input type="number" step="0.01" min="0" max="100" class="form-control text-center" 
                                       name="nilai[<?= $mhs['krs_id']; ?>][tugas]" 
                                       value="<?= $mhs['nilai_tugas']; ?>">
                            </td>
                            <td>
                                <input type="number" step="0.01" min="0" max="100" class="form-control text-center" 
                                       name="nilai[<?= $mhs['krs_id']; ?>][uts]" 
                                       value="<?= $mhs['nilai_uts']; ?>">
                            </td>
                            <td>
                                <input type="number" step="0.01" min="0" max="100" class="form-control text-center" 
                                       name="nilai[<?= $mhs['krs_id']; ?>][uas]" 
                                       value="<?= $mhs['nilai_uas']; ?>">
                            </td>
                            
                            <td class="text-center fw-bold fs-5 text-primary">
                                <?= $mhs['grade']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <button type="submit" class="btn btn-success px-5 rounded-pill">
                    <i class="fas fa-save me-2"></i> Simpan Semua Nilai
                </button>
            </div>

        </form>
    </div>
</div>