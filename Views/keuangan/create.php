<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-danger fw-bold">Buat Tagihan Mahasiswa</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/keuangan/store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Pilih Mahasiswa</label>
                        <select class="form-select" name="mahasiswa_id" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            <?php foreach($data['mahasiswa'] as $m) : ?>
                                <option value="<?= $m['mahasiswa_id']; ?>"><?= $m['nim']; ?> - <?= $m['nama_mahasiswa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Tagihan</label>
                        <input type="text" class="form-control" name="judul_tagihan" placeholder="Contoh: SPP Semester 1" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Tagihan (Rp)</label>
                        <input type="number" class="form-control" name="total_tagihan" placeholder="Contoh: 3000000" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jatuh Tempo</label>
                        <input type="date" class="form-control" name="jatuh_tempo" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/keuangan" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-danger">Terbitkan Tagihan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>