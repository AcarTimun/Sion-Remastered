<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-warning"><i class="fas fa-book"></i> Data Mata Kuliah</h3>
    <a href="<?= BASEURL; ?>/matkul/create" class="btn btn-warning text-white rounded-pill">
        <i class="fas fa-plus"></i> Tambah Matkul
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($data['matkul'] as $mk) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><span class="badge bg-dark"><?= $mk['kode_matkul']; ?></span></td>
                        <td class="fw-bold"><?= $mk['nama_matkul']; ?></td>
                        <td><?= $mk['sks']; ?></td>
                        <td>Semester <?= $mk['semester_peruntukan']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/matkul/edit/<?= $mk['matkul_id']; ?>" class="btn btn-warning btn-sm text-white me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= BASEURL; ?>/matkul/delete/<?= $mk['matkul_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus mata kuliah ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>