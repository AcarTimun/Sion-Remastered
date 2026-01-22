<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-warning fw-bold">Edit Mata Kuliah</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/matkul/update" method="POST">
                    
                    <input type="hidden" name="matkul_id" value="<?= $data['matkul']['matkul_id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matkul" value="<?= $data['matkul']['kode_matkul']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matkul" value="<?= $data['matkul']['nama_matkul']; ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah SKS</label>
                            <select class="form-select" name="sks" required>
                                <option value="2" <?= ($data['matkul']['sks'] == 2) ? 'selected' : ''; ?>>2 SKS</option>
                                <option value="3" <?= ($data['matkul']['sks'] == 3) ? 'selected' : ''; ?>>3 SKS</option>
                                <option value="4" <?= ($data['matkul']['sks'] == 4) ? 'selected' : ''; ?>>4 SKS</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Semester</label>
                            <input type="number" class="form-control" name="semester" min="1" max="8" value="<?= $data['matkul']['semester_peruntukan']; ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/matkul" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning text-white">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>