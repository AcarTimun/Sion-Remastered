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
            if (password_verify($password, $user['password'])) {
                
                // 5. Simpan data user ke Session
                $_SESSION['user'] = [
                    'id' => $user['user_id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                // 6. LOGIKA REDIRECT (PENGALIHAN HALAMAN)
                // Cek Role user, lalu lempar ke halaman yang sesuai
                if ($user['role'] == 'admin') {
                    // Jika Admin -> Masuk ke Dashboard Admin
                    header('Location: ' . BASEURL . '/admin');
                    exit;
                } elseif ($user['role'] == 'dosen') {
                    // ARAH BARU: Masuk ke Portal Dosen
                    header('Location: ' . BASEURL . '/portaldosen');
                    exit;
                } else {
                    // Mahasiswa
                    echo "Login Sukses! Dashboard Mahasiswa belum tersedia.";
                    exit;
                }
                
                

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