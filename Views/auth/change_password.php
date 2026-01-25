<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0"><i class="fas fa-key me-2"></i>Ganti Password</h4>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-warning small">
                    <i class="fas fa-exclamation-triangle"></i> Demi keamanan, gunakan password yang sulit ditebak.
                </div>

                <form action="<?= BASEURL; ?>/auth/update_password" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Lama</label>
                        <input type="password" name="old_password" class="form-control" placeholder="Masukkan password saat ini" required>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Password Baru</label>
                        <input type="password" name="new_password" class="form-control" placeholder="Minimal 6 karakter" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi password baru" required minlength="6">
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill">Simpan Password Baru</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary rounded-pill">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>