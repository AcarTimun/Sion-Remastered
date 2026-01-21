<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-primary"><i class="fas fa-chalkboard-teacher"></i> Data Dosen</h3>
    <a href="<?= BASEURL; ?>/dosen/create" class="btn btn-primary rounded-pill">
        <i class="fas fa-plus"></i> Tambah Dosen
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>Username Akun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($data['dosen'] as $dosen) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><span class="badge bg-info text-dark"><?= $dosen['nidn']; ?></span></td>
                        <td class="fw-bold"><?= $dosen['nama_dosen']; ?></td>
                        <td><?= $dosen['email']; ?></td>
                        <td><code><?= $dosen['username']; ?></code></td>
                        <td>
                            <a href="<?= BASEURL; ?>/dosen/edit/<?= $dosen['dosen_id']; ?>" class="btn btn-warning btn-sm text-white me-1">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= BASEURL; ?>/dosen/delete/<?= $dosen['dosen_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus dosen ini? Akun loginnya juga akan terhapus.')">
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