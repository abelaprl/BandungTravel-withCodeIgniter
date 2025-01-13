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
- Menampilkan informasi detail destinasi.
- Menyimpan riwayat personalisasi pengguna dan melakukan update.

### **2. Sistem Manajemen Transportasi Wisata**
- Menampilkan rute perjalanan, estimasi waktu, jarak, dan titik penjemputan.
- Menawarkan pilihan kendaraan (mobil pribadi, minibus, bus besar).
- Menyediakan jadwal keberangkatan dan estimasi waktu kedatangan.

## **Tata Cara Akses Layanan**

Ikuti langkah-langkah berikut untuk mengakses layanan ini melalui [darkturquoise-lark-626979.hostingersite.com](https://darkturquoise-lark-626979.hostingersite.com/):

1. **Registrasi Akun**
   - Buka halaman utama dan klik tombol **Regoster Here**.
   - Isi formulir registrasi dengan informasi berikut:
     - Nama
     - Email
     - Kata Sandi
     - Preferensi Wisata
   - Klik tombol **Get Started** untuk membuat akun.
   ![image](https://github.com/user-attachments/assets/822e65a9-3fd7-40f5-b0fc-d675aafae18b)
   ![image](https://github.com/user-attachments/assets/dca7d6d6-dc3d-4216-9602-02790a78fbea)

2. **Login**
   - Masuk ke halaman **Login**.
   - Masukkan email dan kata sandi yang telah didaftarkan.
   - Klik tombol **Login**.
   ![image](https://github.com/user-attachments/assets/ff2b5d52-a4af-4dfd-8098-2eda6b188c71)


3. **Rekomendasi Destinasi**
   
   3.1 *Preferensi Pengguna* 
   - Halaman memunculkan rekomendasi berdasarkan masukan pengguna saat register
   - Dapat melakukan update preferensi untuk mendapatkan rekomendasi wisata yang berbeda dengan menekan tombol **update preference**
   ![image](https://github.com/user-attachments/assets/0d637ac7-c532-4ecf-b763-b30b1a5ab7a6)
   ![image](https://github.com/user-attachments/assets/e70a2dba-bdff-4493-8d22-568baab688a5)
   ![image](https://github.com/user-attachments/assets/89ca701f-c872-47f4-beb8-328d157fb7fb)
   ![image](https://github.com/user-attachments/assets/f41027a9-69ab-40db-9eb7-630e0e7bb020)

   3.2 *Detail Destinasi*
   - Dari halaman dashboard rekomendasi maka klik **view details**
   ![image](https://github.com/user-attachments/assets/802cca4e-db05-4e81-8044-3e4faf9aa118)

4. **Manajemen Transportasi**
   
   4.1 *Daftar Rute dan Rekomendasi Wisata* 
   - Klik tombol **go to transportation management** di halaman rekomendasi
   - Halaman memunculkan daftar rute yang tersedia berdasarkan preferensi pengguna
   - Dapat melakukan filter jarak dan area
   ![image](https://github.com/user-attachments/assets/708bcd2e-72f1-4803-b984-5cceafd6a957)
   ![image](https://github.com/user-attachments/assets/7e356fe3-8ae9-4c92-aeb2-5082fd441b5b)

   4.2 *Daftar Rute untuk Destinasi Wisata Tertentu*
   - Dapat melihat detail rute perjalanan
   - Klik **lihat jadwal**
   ![image](https://github.com/user-attachments/assets/a6925ab9-4d2f-4b74-ad39-8679a08519a2)

   4.3 *Statistik Popularitas Destinasi Wisata*
   - Pilih menu **statistik**
   ![image](https://github.com/user-attachments/assets/14cae775-2911-44d2-9dc3-5d756291807f)

   4.4 *Detail Rekomendasi Wisata*
   ![image](https://github.com/user-attachments/assets/6cfccdfd-3d5d-4158-a735-2d5086cd7f56)

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
| Khansa Adilla Reva     | 18222044  | Mengembangkan logika rekomendasi wisata dan hosting di niagahoster.     |


