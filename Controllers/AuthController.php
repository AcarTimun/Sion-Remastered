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
                } elseif ($user['role'] == 'mahasiswa') {
                    // ARAH BARU: Masuk ke Portal Mahasiswa
                    header('Location: ' . BASEURL . '/portalmahasiswa');
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

    // 1. Tampilkan Form Ganti Password
    public function change_password()
    {
        // Cek login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $data['judul'] = 'Ganti Password';
        $this->view('layouts/header', $data);
        $this->view('auth/change_password', $data); // Kita buat file ini
        $this->view('layouts/footer');
    }

    // 2. Proses Ganti Password
    public function update_password()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth');
            exit;
        }

        $userId = $_SESSION['user']['id'];
        $oldPass = $_POST['old_password'];
        $newPass = $_POST['new_password'];
        $confirmPass = $_POST['confirm_password'];

        // A. Validasi Input Kosong
        if(empty($oldPass) || empty($newPass) || empty($confirmPass)) {
            echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
            return;
        }

        // B. Cek Password Baru vs Konfirmasi
        if($newPass !== $confirmPass) {
            echo "<script>alert('Password baru dan konfirmasi tidak cocok!'); window.history.back();</script>";
            return;
        }

        // C. Ambil Data User dari DB (untuk dapat hash password lama)
        $userModel = $this->model('User'); 
        $currentUser = $userModel->getUserById($userId);

        // D. Verifikasi Password Lama
        if(!password_verify($oldPass, $currentUser['password'])) {
            echo "<script>alert('Password lama salah!'); window.history.back();</script>";
            return;
        }

        // E. Hash Password Baru & Simpan
        $newHash = password_hash($newPass, PASSWORD_DEFAULT);
        
        if($userModel->updatePassword($userId, $newHash) > 0) {
            echo "<script>alert('Password berhasil diubah! Silakan login ulang.'); window.location.href='" . BASEURL . "/auth/logout';</script>";
        } else {
            echo "<script>alert('Gagal mengubah password (atau password sama dengan sebelumnya).'); window.history.back();</script>";
        }
    }
}