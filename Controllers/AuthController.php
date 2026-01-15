<?php 

class AuthController extends Controller {
    
    // Menampilkan Halaman Login
    public function index()
    {
        $data['judul'] = 'Login - ' . APP_NAME;
        $this->view('auth/login', $data);
    }

    // Memproses Data Login dari Form
    public function loginProcess()
    {
        // 1. Ambil data dari form
        // Pastikan name="username" dan name="password" di view sudah benar
        if( !isset($_POST['username']) || !isset($_POST['password']) ) {
             header('Location: ' . BASEURL . '/auth');
             exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        // 2. Panggil Model User buat cari akun
        $userModel = $this->model('User');
        $user = $userModel->getUserByUsername($username);

        // 3. Cek apakah user ada di database?
        if ($user) {
            
            // 4. Cek Password (Verifikasi Hash)
            // Kita pakai password_verify karena di database dummy tadi passwordnya ter-enkripsi
            if (password_verify($password, $user['password'])) {
                
                // 5. Simpan data user ke Session (Biar sistem tau siapa yang login)
                $_SESSION['user'] = [
                    'id' => $user['user_id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                // 6. TAMPILKAN PESAN SUKSES
                // (Kita echo manual dulu karena Dashboard belum dibuat)
                echo '<div style="font-family: sans-serif; text-align: center; margin-top: 50px;">';
                echo '<h1 style="color: green;">LOGIN BERHASIL! ✅</h1>';
                echo '<p>Halo, <strong>' . $user['username'] . '</strong>.</p>';
                echo '<p>Anda login sebagai: <span style="background: yellow; padding: 2px 5px;">' . $user['role'] . '</span></p>';
                echo '<hr style="width: 200px;">';
                echo '<p><small>Session tersimpan. Siap masuk ke Dashboard (Next Development).</small></p>';
                echo '<a href="' . BASEURL . '/auth/logout" style="color: red; text-decoration: none;">[ Logout / Keluar ]</a>';
                echo '</div>';
                exit;

            } else {
                // Password Salah
                echo "<script>
                        alert('Password salah!');
                        window.location.href='" . BASEURL . "/auth';
                      </script>";
            }

        } else {
            // Username Tidak Ditemukan
            echo "<script>
                    alert('Username tidak ditemukan!');
                    window.location.href='" . BASEURL . "/auth';
                  </script>";
        }
    }

    // Fitur Logout
    public function logout()
    {
        // Hapus semua sesi
        session_destroy();
        // Kembalikan ke halaman login
        header('Location: ' . BASEURL . '/auth');
        exit;
    }
}