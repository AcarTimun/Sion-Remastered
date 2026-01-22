<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-success"><i class="fas fa-user-graduate"></i> Data Mahasiswa</h3>
    <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn btn-success rounded-pill">
        <i class="fas fa-plus"></i> Tambah Mahasiswa
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($data['mhs'] as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><span class="badge bg-secondary"><?= $mhs['nim']; ?></span></td>
                        <td class="fw-bold"><?= $mhs['nama_mahasiswa']; ?></td>
                        <td><?= $mhs['prodi']; ?></td>
                        <td><?= $mhs['angkatan']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['mahasiswa_id']; ?>" class="btn btn-warning btn-sm text-white me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['mahasiswa_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus mahasiswa ini? Akun loginnya juga akan hilang.')">
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