<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-warning fw-bold">Tambah Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/matkul/store" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matkul" required placeholder="Contoh: TI001">
                        <div class="form-text">Kode harus unik (tidak boleh sama).</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matkul" required placeholder="Contoh: Algoritma dan Pemrograman">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah SKS</label>
                            <select class="form-select" name="sks" required>
                                <option value="2">2 SKS</option>
                                <option value="3">3 SKS</option>
                                <option value="4">4 SKS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Semester</label>
                            <input type="number" class="form-control" name="semester" min="1" max="8" value="1" required>
                            <div class="form-text">Untuk semester berapa matkul ini ditawarkan?</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/matkul" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning text-white">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>