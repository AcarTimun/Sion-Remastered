-- Hapus database jika sudah ada (untuk reset), lalu buat baru
DROP DATABASE IF EXISTS sion_remastered;
CREATE DATABASE sion_remastered;
USE sion_remastered;

-- 1. TABEL USERS (Induk Akun)
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'dosen', 'mahasiswa') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 2. TABEL DOSEN
CREATE TABLE dosen (
    dosen_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nidn VARCHAR(20) NOT NULL UNIQUE,
    nama_dosen VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- 3. TABEL MAHASISWA
-- Note: NIM kita buat VARCHAR(9) & UNIQUE (Tidak boleh kembar)
CREATE TABLE mahasiswa (
    mahasiswa_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nim VARCHAR(9) NOT NULL UNIQUE, 
    nama_mahasiswa VARCHAR(100) NOT NULL,
    prodi ENUM('Sistem Informasi', 'Teknologi Informasi', 'Sistem Komputer') NOT NULL,
    angkatan YEAR NOT NULL,
    semester_aktif INT DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- 4. TABEL MATA KULIAH
-- Note: SKS kita kunci hanya boleh angka 2, 3, atau 4
CREATE TABLE mata_kuliah (
    matkul_id INT AUTO_INCREMENT PRIMARY KEY,
    kode_matkul VARCHAR(10) NOT NULL UNIQUE,
    nama_matkul VARCHAR(100) NOT NULL,
    sks INT NOT NULL CHECK (sks IN (2, 3, 4)),
    semester_peruntukan INT NOT NULL
);

-- 5. TABEL KELAS
CREATE TABLE kelas (
    kelas_id INT AUTO_INCREMENT PRIMARY KEY,
    matkul_id INT NOT NULL,
    dosen_id INT NOT NULL,
    kode_kelas VARCHAR(5) NOT NULL, -- Contoh: AB243
    hari ENUM('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu') NOT NULL,
    jam_mulai TIME NOT NULL,
    jam_selesai TIME NOT NULL,
    kapasitas INT NOT NULL,
    FOREIGN KEY (matkul_id) REFERENCES mata_kuliah(matkul_id) ON DELETE CASCADE,
    FOREIGN KEY (dosen_id) REFERENCES dosen(dosen_id) ON DELETE CASCADE
);

-- 6. TABEL TAGIHAN (Keuangan)
CREATE TABLE tagihan (
    tagihan_id INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT NOT NULL,
    judul_tagihan VARCHAR(100) NOT NULL, -- Contoh: "UKT Semester 3"
    total_tagihan DECIMAL(10, 2) NOT NULL,
    sisa_tagihan DECIMAL(10, 2) NOT NULL,
    status ENUM('Lunas', 'Belum Lunas') DEFAULT 'Belum Lunas',
    tanggal_terbit DATE DEFAULT CURRENT_DATE,
    jatuh_tempo DATE NOT NULL,
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id) ON DELETE CASCADE
);

-- 7. TABEL PEMBAYARAN
CREATE TABLE pembayaran (
    pembayaran_id INT AUTO_INCREMENT PRIMARY KEY,
    tagihan_id INT NOT NULL,
    jumlah_bayar DECIMAL(10, 2) NOT NULL,
    tanggal_bayar DATE DEFAULT CURRENT_DATE,
    bukti_pembayaran VARCHAR(255) NULL, -- Nama file gambar
    status_validasi ENUM('Pending', 'Valid', 'Tolak') DEFAULT 'Pending',
    FOREIGN KEY (tagihan_id) REFERENCES tagihan(tagihan_id) ON DELETE CASCADE
);

-- 8. TABEL KRS (Kartu Rencana Studi)
-- Validasi Max 24 SKS akan dilakukan di Controller PHP
CREATE TABLE krs (
    krs_id INT AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id INT NOT NULL,
    kelas_id INT NOT NULL,
    tanggal_ambil DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id) ON DELETE CASCADE,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE
);

-- 9. TABEL PERTEMUAN (Untuk Absensi)
CREATE TABLE pertemuan (
    pertemuan_id INT AUTO_INCREMENT PRIMARY KEY,
    kelas_id INT NOT NULL,
    pertemuan_ke INT NOT NULL,
    tanggal DATE NOT NULL,
    materi_kuliah TEXT,
    FOREIGN KEY (kelas_id) REFERENCES kelas(kelas_id) ON DELETE CASCADE
);

-- 10. TABEL ABSENSI
CREATE TABLE absensi (
    absensi_id INT AUTO_INCREMENT PRIMARY KEY,
    pertemuan_id INT NOT NULL,
    mahasiswa_id INT NOT NULL,
    status ENUM('Hadir', 'Alfa', 'Sakit', 'Izin') DEFAULT 'Alfa',
    waktu_absen DATETIME DEFAULT NULL,
    FOREIGN KEY (pertemuan_id) REFERENCES pertemuan(pertemuan_id) ON DELETE CASCADE,
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id) ON DELETE CASCADE
);