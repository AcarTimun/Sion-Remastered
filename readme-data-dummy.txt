DATA DUMMY SION REMASTERED
==========================

Deskripsi:
File SQL ini berisi data sampel untuk pengujian sistem secara instan tanpa perlu input manual satu per satu.

Cara Penggunaan:
1. Pastikan database sion_remastered sudah dibuat.
2. Jalankan schema.sql terlebih dahulu (untuk membuat tabel).
3. Jalankan dummy_data.sql ini (untuk mengisi data).

---------------------------------------------------
DAFTAR AKUN LOGIN (Password Semua: 123)
---------------------------------------------------

1. DOSEN
   - Username: 111001 | Nama: Dr. Budi Santoso (Mengajar Algoritma, B.Inggris, Pengantar SI)
   - Username: 111002 | Nama: Sinta Lestari    (Mengajar Basis Data, Pancasila)
   - Username: 111003 | Nama: Dedi Pratama     (Mengajar Web, Agama, SisDig)

2. MAHASISWA
   - Username: 230030211 | Nama: Andi (Prodi SI, Semester 5)
   - Username: 240030212 | Nama: Bayu (Prodi TI, Semester 3)
   - Username: 250032212 | Nama: Citra (Prodi SK, Semester 1    )

3. ADMIN
   - Username: admin (Bawaan dari schema.sql)

---------------------------------------------------
DETAIL DATA PER TABEL
---------------------------------------------------

Tabel: mata_kuliah
- Berisi 8 mata kuliah.
- Total SKS jika dijumlahkan adalah 25 SKS.
- Tujuannya: Untuk mengetes validasi batas maksimal 24 SKS saat KRS.

Tabel: kelas
- Berisi 8 jadwal kelas aktif.
- Kode kelas variatif (contoh: AL241, BD242).
- Tersebar dari hari Senin sampai Jumat.

Tabel: tagihan
- Semua mahasiswa (Andi, Bayu, Citra) dibuatkan tagihan SPP.
- Status tagihan diset LUNAS.
- Tujuannya: Agar mahasiswa bisa langsung masuk menu KRS tanpa terblokir validasi keuangan.

---------------------------------------------------
SKENARIO TESTING FITUR
---------------------------------------------------

1. Tes KRS (Limit SKS):
   Login sebagai Andi (240030211). Coba ambil semua mata kuliah yang tersedia.
   Ekspektasi: Sistem menolak mata kuliah terakhir karena total akan menjadi 25 SKS (Max 24).

2. Tes Input Nilai:
   Login sebagai Pak Budi (111001). Masuk menu Input Nilai.
   Pilih kelas Algoritma. Input nilai untuk mahasiswa yang mengambil kelas tersebut.

3. Tes Lihat KHS:
   Setelah nilai diinput dosen, login kembali sebagai mahasiswa untuk melihat Grade A/B/C dan IPK di menu KHS.