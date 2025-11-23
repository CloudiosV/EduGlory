# 📦 Edu Glory – Scholarship & Competition Platform

Edu Glory adalah platform yang dirancang untuk membantu pelajar menemukan peluang beasiswa, mengikuti kompetisi, menyimpan item favorit, serta menerima notifikasi penting terkait batas waktu atau pembaruan informasi.  
Platform ini bertujuan menjadi pusat pencarian prestasi bagi pelajar yang ingin berkembang dan meraih kesempatan terbaik.

---

## ✨ Fitur Utama

### 👤 Authentication System
- Login & Logout  
- Perlindungan halaman dengan Middleware  

### 🎓 Scholarship & Competition
- Melihat daftar beasiswa & lomba  
- Melihat detail beasiswa/lomba  
- Menerima notifikasi batas pendaftaran  
- Bookmark / favorite item  

### ⭐ Favorite System
- Simpan dan kelola item favorit (bookmark)  

### 🔔 Notification System
- Notifikasi untuk deadline  
- Tandai notifikasi sebagai dibaca  
- Hapus notifikasi  

### 🏠 Dashboard (Admin)
Admin dapat:  
- Melihat statistik (most viewed, most applied)  
- Mengelola data beasiswa & lomba  
- Menambah, mengedit, dan menghapus item  
- Melihat daftar user  

### 🎨 User Interface
- Sidebar navigasi  
- Halaman detail item  
- Slideshow banner (homepage)  
- UI berbasis TailwindCSS  

---

## 🛠 Tech Stack

**Backend**  
- Laravel 11  
- PHP 8+  
- Laravel Notifications  

**Frontend**  
- Blade Template  
- TailwindCSS  
- Font Awesome  

**Database**  
- MySQL  
- phpMyAdmin  

**Tools & Development**  
- Visual Studio Code  
- Composer  
- NPM  
- Laragon  
- GitHub  
- Figma (UI Design)  

---

## 📂 Project Structure

**Controllers**  
- HomeController  
- ScholarshipController  
- CompetitionController  
- BookmarkController  
- NotificationController  
- AdminController  

**Models**  
- User  
- Scholarship  
- Bookmark  
- Notification  

**Migrations**  
- create_users_table  
- create_scholarships_table  
- create_bookmarks_table  
- create_notifications_table  

**Views**  

**📱 User**  
- home/index.blade.php  
- home/show.blade.php  
- scholarship/index.blade.php  
- contest/index.blade.php  
- notifications/index.blade.php  
- bookmarks/index.blade.php  

**🛠 Admin**  
- admin/index.blade.php  
- admin/scholarship/index.blade.php  
- admin/competition/index.blade.php  
- admin/... (CRUD pages)  

---

## 🧱 Database Overview

**Users Table**  
- id  
- name  
- email  
- password  
- role (admin/user)  
- profile_picture  

**Scholarships / Competitions Table**  
- id  
- title  
- description  
- organizer  
- picture  
- address  
- registration_link  
- category_id (1 = scholarship, 2 = competition)  
- view_count  
- apply_count  

**Bookmarks Table**  
- id  
- user_id  
- item_id  
- tipe (scholarship/contest)  

**Notifications Table**  
- id  
- user_id  
- data (JSON)  
- read_at  

---

## 🔄 Application Flow

### 👤 For Users
1. Login ke aplikasi  
2. Masuk ke Homepage  
3. Melihat beasiswa & kompetisi terbaru  
4. Mengklik item → membuka detail  
5. Bookmark item jika tertarik  
6. Mengaktifkan notifikasi (deadline reminder)  
7. Melihat notifikasi terbaru  
8. Mengelola bookmark dari menu Favorite  

### 🛠 For Admin
1. Login sebagai Admin  
2. Masuk Dashboard  
3. Mengelola:  
   - Beasiswa  
   - Kompetisi  
   - User  
4. Melihat statistik view & apply  
5. Menambah / mengedit / menghapus data  
6. Mengelola banner homepage  

---

## 🚀 Instalasi & Penggunaan

1. **Clone Repository**
```bash
git clone https://github.com/CloudiosV/EduGlory.git
cd EduGlory

2. **Install Dependencies**
composer install
npm install
npm run dev

3. **Setup Environment**
cp .env.example .env

4. **Generate App Key**
php artisan key:generate

5. **Migrasi Database + Seeder**
php artisan migrate --seed

6. **Jalankan Server**
php artisan serve

📌 Rencana Pengembangan

- 📱 Tampilan Mobile Responsif

- 🧑‍💼 Role User yang lebih lengkap (Admin / Guru / Siswa)

- 📊 Laporan pendaftaran & statistik beasiswa/lomba

- 📨 Email notification system

- 🗃 Manajemen banner dari Admin Panel

🙏 Penutup

Edu Glory masih dalam tahap aktif pengembangan 🚧.
Kami berharap platform ini dapat membantu pelajar menemukan peluang beasiswa dan kompetisi dengan lebih mudah, cepat, dan terstruktur.

Setiap saran, kritik, dan kontribusi dari komunitas sangat kami hargai ❤️
Mari bersama membangun platform yang bermanfaat bagi banyak pelajar.