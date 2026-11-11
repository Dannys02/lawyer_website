# Website Kantor Hukum Nurul Safii & Partners

[English Version](README.md)

## Pengertian Website
Website ini adalah portal profil resmi, pusat informasi hukum, dan saluran komunikasi Kantor Hukum Nurul Safii, S.H., M.H., C.MSP & Partners. Platform ini dirancang untuk menyajikan profil firma hukum, bidang spesialisasi praktik, arsip literatur, serta fasilitas konsultasi hukum online bagi masyarakat dan korporasi.

## Tujuan dan Masalah yang Diselesaikan
- **Hambatan Akses Informasi Hukum:** Menyediakan sumber literasi hukum publik yang kredibel melalui artikel opini hukum, jurnal ilmiah, dan berita pers.
- **Kesulitan Menghubungi Advokat:** Mempermudah pencari keadilan untuk terhubung langsung ke tim advokat via WhatsApp resmi dan asisten virtual AI.
- **Pengelolaan Konten yang Terfragmentasi:** Menyediakan panel admin terpusat untuk memperbarui profil kantor, tim partner, layanan hukum, karya ilmiah, galeri, tautan media sosial, serta ulasan klien secara dinamis.
- **Keamanan Data dan Privasi:** Mengamankan data administratif dan akun internal melalui autentikasi ketat serta pembatasan data publik pada asisten AI.

## Fitur Utama
- **Halaman Publik:** Katalog layanan hukum, daftar partner, artikel hukum berbasis pencarian realtime, unduh berkas PDF jurnal, berita, dan galeri kegiatan.
- **Asisten AI Interaktif:** Menggunakan model Gemini 3.1 Flash Lite yang dibatasi hanya menjawab seputar info publik kantor hukum dengan kuota harian.
- **Panel Manajemen Admin:** Modul CRUD khusus tanpa modal untuk artikel, berita, jurnal hukum, partner, galeri, data about, media sosial, dan moderasi ulasan.

## Cara Menggunakan

### Kebutuhan Sistem
- PHP >= 8.1
- Composer
- Node.js & NPM
- Database MySQL

### Langkah Instalasi
1. Gandakan repositori dan masuk ke direktori proyek:
   ```bash
   git clone <repository_url>
   cd lawyer
   ```
2. Pasang dependensi aplikasi:
   ```bash
   composer install
   npm install
   ```
3. Konfigurasi file lingkungan:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Sesuaikan konfigurasi database dan kunci Gemini API pada file `.env`:
   ```env
   DB_DATABASE=lawyer
   DB_USERNAME=root
   DB_PASSWORD=

   API_GEMINI_KEY=kunci_api_gemini_anda
   GEMINI_MODEL=gemini-3.1-flash-lite
   GEMINI_DAILY_LIMIT=10
   ```
4. Jalankan migrasi dan tautkan penyimpanan file:
   ```bash
   php artisan migrate
   php artisan storage:link
   ```
5. Kompilasi aset frontend dan jalankan server lokal:
   ```bash
   npm run build
   php artisan serve
   ```

### Panduan Akses
- **Pengunjung Umum:** Buka alamat `http://127.0.0.1:8000` untuk menjelajahi profil firma, membaca literatur hukum, memberikan ulasan, atau bertanya ke asisten AI melalui tombol bantuan mengambang.
- **Administrator:** Buka rute `/login` untuk masuk ke dasbor admin (`/home`) dan mengelola seluruh konten publikasi serta informasi website.
