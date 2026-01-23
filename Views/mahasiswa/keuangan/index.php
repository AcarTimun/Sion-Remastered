<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-danger fw-bold"><i class="fas fa-wallet"></i> Keuangan Saya</h3>
</div>

<div class="row">
    <?php if(empty($data['tagihan'])) : ?>
        <div class="col-12"><div class="alert alert-success">Tidak ada tagihan aktif. Horee!</div></div>
    <?php else : ?>
        <?php foreach($data['tagihan'] as $tagihan) : ?>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold"><?= $tagihan['judul_tagihan']; ?></h5>
                        <?php if($tagihan['status'] == 'Lunas') : ?>
                            <span class="badge bg-success">LUNAS</span>
                        <?php else : ?>
                            <span class="badge bg-danger">BELUM LUNAS</span>
                        <?php endif; ?>
                    </div>
                    
                    <h2 class="text-primary my-3">Rp <?= number_format($tagihan['total_tagihan'], 0, ',', '.'); ?></h2>
                    <p class="text-muted small mb-3">Jatuh Tempo: <?= date('d F Y', strtotime($tagihan['jatuh_tempo'])); ?></p>

                    <?php if($tagihan['status'] == 'Lunas') : ?>
                        <div class="alert alert-success py-2 mb-0"><i class="fas fa-check-circle"></i> Terimakasih, pembayaran diterima.</div>
                    
                    <?php elseif($tagihan['status_validasi'] == 'Pending') : ?>
                        <div class="alert alert-warning py-2 mb-0"><i class="fas fa-clock"></i> Bukti sedang diverifikasi Admin.</div>
                    
                    <?php else : ?>
                        <form action="<?= BASEURL; ?>/portalmahasiswa/bayar" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="tagihan_id" value="<?= $tagihan['tagihan_id']; ?>">
                            <input type="hidden" name="jumlah_bayar" value="<?= $tagihan['total_tagihan']; ?>">
                            
                            <label class="form-label small fw-bold">Upload Bukti Transfer (JPG/PNG)</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="bukti_pembayaran" required accept="image/*">
                                <button class="btn btn-primary" type="submit">Kirim Bukti</button>
                            </div>
                            <?php if($tagihan['status_validasi'] == 'Tolak') : ?>
                                <small class="text-danger d-block mt-1">*Bukti sebelumnya ditolak. Silakan upload ulang.</small>
                            <?php endif; ?>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>