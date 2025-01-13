# Sistem Rekomendasi dan Manajemen Transportasi Wisata

Proyek ini merupakan aplikasi berbasis web yang dikembangkan menggunakan **CodeIgniter** dan di-hosting menggunakan **Niagahoster**.  
Sistem ini membantu pengguna dalam merencanakan perjalanan wisata di Bandung dengan dua layanan utama:

1. **Sistem Rekomendasi Destinasi Wisata**  
   Memberikan rekomendasi tempat wisata sesuai preferensi pengguna.

2. **Sistem Manajemen Transportasi Wisata**  
   Memudahkan pengguna dalam merencanakan transportasi ke destinasi wisata.

---

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 4
- **Database**: MySQL
- **Hosting**: Niagahoster
- **Bahasa Pemrograman**: PHP, HTML, CSS, JavaScript
- **Pendekatan Arsitektur**: Microservices

---

## Fitur Utama

### **1. Sistem Rekomendasi Destinasi Wisata**
- Menyediakan rekomendasi berdasarkan:
  - Minat wisata (alam, budaya, kuliner).
  - Rating destinasi.
- Menampilkan informasi detail destinasi (deskripsi, foto, ulasan).
- Menyimpan riwayat pencarian untuk personalisasi rekomendasi.

### **2. Sistem Manajemen Transportasi Wisata**
- Menampilkan rute perjalanan, estimasi waktu, jarak, dan titik penjemputan.
- Menawarkan pilihan kendaraan (mobil pribadi, minibus, bus besar).
- Menyediakan jadwal keberangkatan dan estimasi waktu kedatangan.

---

## Cara Instalasi (Untuk Pengembangan Lokal)

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal:

1. Clone repositori:
   ```bash
   git clone https://github.com/abelaprl/BandungTravel-withCodeIgniter
2. Masuk ke direktori proyek
   ```bash
   cd repo-name
3. Install dependencies dengan Composer
   ```bash
   composer install
4. Atur konfigurasi database di file .env
   ```bash
   database.default.hostname = localhost
   database.default.database = nama_database
   database.default.username = username_database
   database.default.password = password_database
   database.default.DBDriver = MySQLi
5. Migrasi tabel ke database
   ```bash
   php spark migrate
6. Jalankan server lokal
   ```bash
   http://localhost:8080

---

## Cara Hosting di Niagahoster

1. **Upload File Proyek**:
   - Zip file proyek Anda, lalu unggah ke **File Manager** di cPanel Niagahoster.
   - Ekstrak file ke folder `public_html`.

2. **Konfigurasi Database**:
   - Buat database baru di cPanel.
   - Impor file SQL melalui **phpMyAdmin**.
   - Atur koneksi database di file `.env` seperti berikut:
     ```env
     database.default.hostname = localhost
     database.default.database = nama_database
     database.default.username = username_cpanel
     database.default.password = password_cpanel
     database.default.DBDriver = MySQLi
     ```
3. **Sesuaikan Base URL**:
   - Ubah `baseURL` di file `app/Config/App.php`:
     ```php
     public $baseURL = 'https://nama-domain-anda.com/';
     ```

4. **Akses Aplikasi**:
   - Buka domain Anda di browser, dan aplikasi akan berjalan sesuai konfigurasi.
  
   # Kontribusi

| Nama Kontributor       | NIM       | Kontribusi                                                      |
|------------------------|-----------|----------------------------------------------------------------|
| Abel Apriliani         | 18222008  | Mengembangkan logika manajemen transportasi wisata dan integrasi kedua fitur utama layanan serta database.|
| Khansa Adilla Reva     | 18222044  | Mengembangkan logika rekomendasi wisata dan deployment di niagahoster.     |


