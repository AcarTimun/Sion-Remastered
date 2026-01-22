<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-primary"><i class="fas fa-calendar-alt"></i> Manajemen Kelas & Jadwal</h3>
    <a href="<?= BASEURL; ?>/kelas/create" class="btn btn-primary rounded-pill">
        <i class="fas fa-plus"></i> Buka Kelas Baru
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Dosen Pengajar</th>
                        <th>Jadwal</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($data['kelas'] as $row) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><span class="badge bg-dark"><?= $row['kode_kelas']; ?></span></td>
                        <td>
                            <strong><?= $row['nama_matkul']; ?></strong><br>
                            <small class="text-muted"><?= $row['sks']; ?> SKS (Smt <?= $row['semester_peruntukan']; ?>)</small>
                        </td>
                        <td><?= $row['nama_dosen']; ?></td>
                        <td>
                            <span class="badge bg-info text-dark"><?= $row['hari']; ?></span><br>
                            <small><?= date('H:i', strtotime($row['jam_mulai'])); ?> - <?= date('H:i', strtotime($row['jam_selesai'])); ?></small>
                        </td>
                        <td><?= $row['kapasitas']; ?> Mhs</td>
                        <td>
                            <a href="<?= BASEURL; ?>/kelas/edit/<?= $row['kelas_id']; ?>" class="btn btn-warning btn-sm text-white me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= BASEURL; ?>/kelas/delete/<?= $row['kelas_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kelas ini?')">
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