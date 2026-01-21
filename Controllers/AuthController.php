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
                } else {
                    // Jika Role lain (Dosen/Mahasiswa)
                    // Karena dashboard mereka belum kita buat, kita tampilkan pesan dulu
                    echo '<div style="font-family: sans-serif; text-align: center; margin-top: 50px;">';
                    echo '<h1 style="color: blue;">Login Sukses! ✅</h1>';
                    echo '<p>Halo, <strong>' . $user['username'] . '</strong>.</p>';
                    echo '<p>Anda login sebagai: ' . $user['role'] . '</p>';
                    echo '<p style="color: red;"><em>Maaf, Dashboard untuk role Anda sedang dalam tahap konstruksi.</em></p>';
                    echo '<a href="' . BASEURL . '/auth/logout">Logout</a>';
                    echo '</div>';
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