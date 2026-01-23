<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-danger"><i class="fas fa-wallet"></i> Data Keuangan</h3>
    <a href="<?= BASEURL; ?>/keuangan/create" class="btn btn-danger rounded-pill">
        <i class="fas fa-plus"></i> Buat Tagihan
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Judul Tagihan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['tagihan'] as $row) : 
                        // Cek apakah ada pembayaran masuk untuk tagihan ini (Query manual kecil atau logic model)
                        // Untuk simplifikasi, kita asumsikan admin cek detail manual atau kita buat join di model tadi.
                        // Wait, Model getAllTagihan tadi belum join pembayaran.
                        // Biar cepat, kita tambahkan tombol "Cek Bukti" yang hanya muncul kalau status Belum Lunas.
                        
                        // NOTE: Di implementasi nyata, harusnya ada join ke tabel pembayaran.
                        // Tapi untuk prototype ini, kita akali dengan menampilkan tombol Cek Validasi.
                        // Agar admin bisa melihat bukti bayar, kita perlu mengambil data pembayaran yg pending.
                        $db = new Database;
                        $db->query("SELECT * FROM pembayaran WHERE tagihan_id = :tid ORDER BY pembayaran_id DESC LIMIT 1");
                        $db->bind('tid', $row['tagihan_id']);
                        $bayar = $db->single();
                    ?>
                    <tr>
                        <td>
                            <strong><?= $row['nama_mahasiswa']; ?></strong><br>
                            <small class="text-muted"><?= $row['nim']; ?></small>
                        </td>
                        <td><?= $row['judul_tagihan']; ?></td>
                        <td class="fw-bold">Rp <?= number_format($row['total_tagihan'], 0, ',', '.'); ?></td>
                        <td>
                            <?php if($row['status'] == 'Lunas') : ?>
                                <span class="badge bg-success">Lunas</span>
                            <?php else : ?>
                                <span class="badge bg-danger">Belum Lunas</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($bayar && $bayar['status_validasi'] == 'Pending') : ?>
                                <a href="<?= BASEURL; ?>/uploads/bukti/<?= $bayar['bukti_pembayaran']; ?>" target="_blank" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-image"></i> Cek Bukti
                                </a>
                            <?php elseif($bayar && $bayar['status_validasi'] == 'Valid') : ?>
                                <small class="text-success"><i class="fas fa-check"></i> Valid</small>
                            <?php else : ?>
                                <small class="text-muted">-</small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($bayar && $bayar['status_validasi'] == 'Pending') : ?>
                                <a href="<?= BASEURL; ?>/keuangan/validasi/<?= $bayar['pembayaran_id']; ?>/<?= $row['tagihan_id']; ?>/terima" class="btn btn-success btn-sm" onclick="return confirm('Validasi pembayaran ini?')">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="<?= BASEURL; ?>/keuangan/validasi/<?= $bayar['pembayaran_id']; ?>/<?= $row['tagihan_id']; ?>/tolak" class="btn btn-danger btn-sm" onclick="return confirm('Tolak pembayaran ini?')">
                                    <i class="fas fa-times"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>