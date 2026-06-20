# Sion Remastered

Proyek ini adalah aplikasi web berbasis PHP dengan arsitektur MVC (Model-View-Controller). Setelah dipindai, proyek Anda **sudah siap dijalankan** tanpa perlu mengubah baris kode apa pun! Konfigurasi `BASEURL` sudah dibuat otomatis dan konfigurasi database sudah menggunakan default XAMPP/Laragon.

## Persyaratan Sistem
1. Web Server lokal (misal: **XAMPP**, **Laragon**, atau **WAMP**).
2. PHP berjalan dengan baik.
3. Database MySQL/MariaDB.

## Cara Menjalankan Proyek

### 1. Letakkan Folder di Tempat yang Benar
Pastikan folder `Sion-Remastered` ini berada di dalam direktori *document root* web server Anda:
- **XAMPP:** Letakkan di folder `htdocs` (contoh: `C:\xampp\htdocs\Sion-Remastered`).
- **Laragon:** Letakkan di folder `www` (contoh: `C:\laragon\www\Sion-Remastered`).

### 2. Nyalakan Service Apache & MySQL
Buka *Control Panel* XAMPP atau Laragon Anda, lalu klik **Start** pada layanan:
- **Apache**
- **MySQL**

### 3. Setup Database
Proyek ini membutuhkan database dengan nama **`sion_remastered`**.
1. Buka browser dan pergi ke phpMyAdmin: `http://localhost/phpmyadmin`
2. Buat database baru (Create Database) dengan nama: `sion_remastered`
3. Pilih database `sion_remastered` tersebut.
4. Klik tab **Import**, lalu pilih file `schema.sql` (berada di folder utama proyek) dan klik **Go** / Kirim.
5. (Opsional) Ulangi langkah Import, pilih file `dummy_data.sql` agar aplikasi langsung terisi data dummy untuk di-test.

> **Info Tambahan:** File `app/Config/Config.php` sudah disetel menggunakan user `root` dan password kosong `''`. Jika Anda belum pernah mengubah setelan dasar database XAMPP/Laragon, Anda tidak perlu mengubah apa-apa lagi.

### 4. Buka Aplikasi di Browser
Setelah database siap, buka tab baru di browser Anda dan ketikkan URL berikut:
👉 **http://localhost/Sion-Remastered/public/**

---

## Akun untuk Login (Jika memakai `dummy_data.sql`)
Password untuk semua akun di bawah adalah: **`123`**

- **Admin:** Username: `admin`
- **Dosen:** Username: `111001` (Pak Budi)
- **Mahasiswa:** Username: `230030211` (Andi)

*Silakan baca `readme-data-dummy.txt` untuk informasi testing lebih lengkap.*
