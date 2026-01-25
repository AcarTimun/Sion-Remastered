USE sion_remastered;

-- ==========================================
-- 1. INSERT USER & DATA DOSEN (3 Orang)
-- Password '123' hash: $2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m
-- ==========================================

-- Dosen 1: Pak Budi
INSERT INTO users (username, password, role) VALUES ('111001', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'dosen');
INSERT INTO dosen (user_id, nidn, nama_dosen, email) VALUES (LAST_INSERT_ID(), '111001', 'Dr. Budi Santoso, M.Kom', 'budi@stikom.ac.id');

-- Dosen 2: Bu Sinta
INSERT INTO users (username, password, role) VALUES ('111002', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'dosen');
INSERT INTO dosen (user_id, nidn, nama_dosen, email) VALUES (LAST_INSERT_ID(), '111002', 'Sinta Lestari, S.T., M.T.', 'sinta@stikom.ac.id');

-- Dosen 3: Pak Dedi
INSERT INTO users (username, password, role) VALUES ('111003', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'dosen');
INSERT INTO dosen (user_id, nidn, nama_dosen, email) VALUES (LAST_INSERT_ID(), '111003', 'Dedi Pratama, M.Cs', 'dedi@stikom.ac.id');


-- ==========================================
-- 2. INSERT USER & DATA MAHASISWA (3 Orang)
-- ==========================================

-- Mhs 1: Andi (Angkatan 24 - SI)
INSERT INTO users (username, password, role) VALUES ('240030211', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'mahasiswa');
INSERT INTO mahasiswa (user_id, nim, nama_mahasiswa, prodi, angkatan, semester_aktif) 
VALUES (LAST_INSERT_ID(), '240030211', 'Andi Saputra', 'Sistem Informasi', '2024', 1);

-- Mhs 2: Bayu (Angkatan 24 - TI)
INSERT INTO users (username, password, role) VALUES ('240030212', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'mahasiswa');
INSERT INTO mahasiswa (user_id, nim, nama_mahasiswa, prodi, angkatan, semester_aktif) 
VALUES (LAST_INSERT_ID(), '240030212', 'Bayu Nugraha', 'Teknologi Informasi', '2024', 1);

-- Mhs 3: Citra (Angkatan 23 - SK - Ceritanya Kating Semester 3)
INSERT INTO users (username, password, role) VALUES ('230032212', '$2y$12$scIC2sHodeHp45fk7oVvF.QO2fi4pTC3GOlmYxF7IGEZozpV8WM3m', 'mahasiswa');
INSERT INTO mahasiswa (user_id, nim, nama_mahasiswa, prodi, angkatan, semester_aktif) 
VALUES (LAST_INSERT_ID(), '230032212', 'Citra Kirana', 'Sistem Komputer', '2023', 3);


-- ==========================================
-- 3. INSERT MATA KULIAH (Total 25 SKS - Buat Tes Limit)
-- ==========================================

INSERT INTO mata_kuliah (kode_matkul, nama_matkul, sks, semester_peruntukan) VALUES 
('TI001', 'Algoritma dan Pemrograman', 4, 1),
('TI002', 'Basis Data Dasar', 4, 1),
('TI003', 'Pemrograman Web I', 4, 2), -- Smt 2
('UM001', 'Bahasa Inggris I', 2, 1),
('UM002', 'Pendidikan Agama', 2, 1),
('UM003', 'Pancasila', 2, 1),
('SI001', 'Pengantar Sistem Informasi', 3, 1),
('SK001', 'Sistem Digital', 4, 1);


-- ==========================================
-- 4. INSERT KELAS (Jodohkan Matkul + Dosen)
-- Dosen ID: 1 (Budi), 2 (Sinta), 3 (Dedi)
-- Matkul ID: 1-8 (Sesuai urutan insert di atas)
-- ==========================================

-- Kelas Algoritma (Pak Budi - ID 1)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (1, 1, 'AL241', 'Senin', '08:00:00', '11:00:00', 40);

-- Kelas Basis Data (Bu Sinta - ID 2)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (2, 2, 'BD242', 'Selasa', '08:00:00', '11:00:00', 40);

-- Kelas Web (Pak Dedi - ID 3)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (3, 3, 'PW243', 'Rabu', '13:00:00', '16:00:00', 30);

-- Kelas Bahasa Inggris (Pak Budi - ID 1)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (4, 1, 'EN244', 'Kamis', '08:00:00', '09:40:00', 50);

-- Kelas Agama (Pak Dedi - ID 3)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (5, 3, 'AG245', 'Jumat', '09:00:00', '10:40:00', 50);

-- Kelas Pancasila (Bu Sinta - ID 2)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (6, 2, 'PN246', 'Senin', '13:00:00', '14:40:00', 50);

-- Kelas Pengantar SI (Pak Budi - ID 1)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (7, 1, 'PS247', 'Selasa', '13:00:00', '15:30:00', 40);

-- Kelas SisDig (Pak Dedi - ID 3)
INSERT INTO kelas (matkul_id, dosen_id, kode_kelas, hari, jam_mulai, jam_selesai, kapasitas) 
VALUES (8, 3, 'SD248', 'Rabu', '08:00:00', '11:00:00', 35);


-- ==========================================
-- 5. INSERT TAGIHAN (Biar Mahasiswa Bisa Langsung KRS)
-- Set LUNAS semua
-- ==========================================

-- Tagihan Andi (ID 1)
INSERT INTO tagihan (mahasiswa_id, judul_tagihan, total_tagihan, sisa_tagihan, status, jatuh_tempo)
VALUES (1, 'SPP Semester Ganjil 2024', 3000000, 0, 'Lunas', '2024-08-01');

-- Tagihan Bayu (ID 2)
INSERT INTO tagihan (mahasiswa_id, judul_tagihan, total_tagihan, sisa_tagihan, status, jatuh_tempo)
VALUES (2, 'SPP Semester Ganjil 2024', 3000000, 0, 'Lunas', '2024-08-01');

-- Tagihan Citra (ID 3)
INSERT INTO tagihan (mahasiswa_id, judul_tagihan, total_tagihan, sisa_tagihan, status, jatuh_tempo)
VALUES (3, 'SPP Semester Ganjil 2023', 3500000, 0, 'Lunas', '2023-08-01');