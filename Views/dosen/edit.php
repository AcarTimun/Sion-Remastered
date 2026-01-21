<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 text-primary fw-bold">Edit Data Dosen</h5>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL; ?>/dosen/update" method="POST">
                    
                    <input type="hidden" name="dosen_id" value="<?= $data['dosen']['dosen_id']; ?>">

                    <div class="mb-3">
                        <label for="nidn" class="form-label">NIDN (Username)</label>
                        <input type="text" class="form-control bg-light" id="nidn" name="nidn" 
                               value="<?= $data['dosen']['nidn']; ?>" readonly>
                        <div class="form-text text-danger">NIDN tidak dapat diubah karena terhubung dengan akun login.</div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_dosen" class="form-label">Nama Lengkap & Gelar</label>
                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" 
                               value="<?= $data['dosen']['nama_dosen']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Aktif</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?= $data['dosen']['email']; ?>" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= BASEURL; ?>/dosen" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>