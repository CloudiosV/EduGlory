# 📦 TrackIn  

🎓 Edu Glory adalah sebuah portal beasiswa dan lomba yang membantu pelajar dalam menemukan peluang beasiswa, mengikuti kompetisi, serta mengembangkan potensi diri untuk meraih prestasi terbaik. 

## ✨ Fitur Utama  
Saat ini, proyek masih dalam tahap awal pengembangan, namun sudah memiliki simulasi beberapa fitur:  
- 📊 *Dashboard* – menampilkan informasi beasiswa & lomba.   
- 🕒 *Favorite* – menampilkan list yang kita favorite.  
- 🔔 *Notifikasi* – pemberitahuan terkait batas pendaftaran terakhir lomba atau beasiswa.  
- 🔍 *Filter* – memudahkan pencarian barang.  
- 🗄 *Database* – penyimpanan data inventaris dan transaksi.  

## 🛠 Tech Stack
- Laravel (Backend & Framework)
- MySQL (Database)
- Blade + Tailwind (Frontend)
- Composer & NPM (Dependencies)

⚠ Catatan:  
- Proyek ini *belum sepenuhnya responsif* di semua perangkat.  
- Masih akan terus dikembangkan dengan penambahan fitur baru & perbaikan.  

## 🚀 Instalasi & Penggunaan  

1. *Clone Repository*  
   bash
   git clone https://github.com/CloudiosV/EduGlory.git
   cd EduGlory
   

2. *Instalasi Dependensi*  
   Pastikan sudah menginstal [Composer](https://getcomposer.org/) dan [Node.js](https://nodejs.org/).  
   bash
   composer install
   npm install 
   npm run dev
   

3. *Konfigurasi Environment*  
   Buat file .env dari template:  
   bash
   cp .env.example .env
   
   Lalu sesuaikan konfigurasi database dan pengaturan lain di file .env.  

4. *Generate App Key*  
   bash
   php artisan key:generate
   

5. *Migrasi Database*  
   bash
   php artisan migrate --seed
   

6. *Jalankan Aplikasi*  
   bash
   php artisan serve
     

## 📌 Rencana Pengembangan  
- Tampilan Responsif – Akses mudah di berbagai perangkat, mulai dari HP hingga laptop.
- Sistem Role User – Manajemen akun terpisah untuk Admin, Siswa, dan Guru agar lebih terstruktur. 
- Laporan & Statistik – Penyajian data pendaftaran beasiswa dan lomba dalam bentuk laporan dan grafik yang informatif.

## 🙏 Penutup  
✨ Edu Glory masih dalam tahap awal pengembangan 🚧, namun kami yakin platform ini akan menjadi pintu bagi pelajar untuk lebih mudah menemukan beasiswa dan lomba bergengsi.
Kami sangat terbuka terhadap kritik, saran, maupun kontribusi dari komunitas untuk menjadikan Edu Glory semakin bermanfaat.