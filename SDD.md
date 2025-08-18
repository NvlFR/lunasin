Dokumen Desain Perangkat Lunak (Software Design Document): Proyek "Lunasin"
Versi: 1.0 Tanggal: 18 Agustus 2025

1. Pendahuluan
1.1. Tujuan Dokumen
Dokumen ini bertujuan untuk memberikan deskripsi desain teknis yang komprehensif untuk aplikasi Lunasin. "Lunasin" (nama disimpulkan dari direktori proyek) adalah sebuah aplikasi web yang dibangun menggunakan framework Laravel. Dokumen ini akan menguraikan arsitektur sistem, desain data, komponen utama, dan antarmuka pengguna. Tujuannya adalah sebagai panduan bagi pengembang dan sebagai dasar untuk membuat permintaan pengembangan (prompting) yang terstruktur.

1.2. Ruang Lingkup Proyek
Berdasarkan analisis struktur file, aplikasi ini adalah sistem manajemen keuangan atau akuntansi sederhana. Fungsionalitas utamanya mencakup:

Manajemen Pengguna (Autentikasi).
Manajemen Transaksi Keuangan (Pemasukan & Pengeluaran).
Manajemen Kategori Transaksi.
Manajemen Pihak Ketiga (Parties), seperti pelanggan atau vendor.
Pengaturan aplikasi.
Potensi adanya panel Admin untuk pengelolaan lebih lanjut.
1.3. Glosarium
Party: Pihak ketiga yang terlibat dalam transaksi (misal: pelanggan, vendor, karyawan).
Transaction: Catatan keuangan, bisa berupa pemasukan (income) atau pengeluaran (expense).
Inertia.js: Protokol yang memungkinkan pembuatan aplikasi web single-page (SPA) dengan menggunakan backend monolitik klasik seperti Laravel.
Quasar: Framework UI berbasis Vue.js yang digunakan untuk membangun antarmuka pengguna.
Vite: Alat build frontend modern yang sangat cepat.
2. Deskripsi Sistem Keseluruhan
Aplikasi Lunasin adalah platform berbasis web yang dirancang untuk membantu pengguna melacak transaksi keuangan mereka. Sistem ini memungkinkan pengguna untuk mencatat pemasukan dan pengeluaran, mengkategorikannya, dan mengaitkannya dengan pihak ketiga tertentu. Arsitektur modern dengan Laravel di sisi backend dan Inertia.js di sisi frontend memberikan pengalaman pengguna yang responsif dan cepat layaknya aplikasi SPA.

3. Arsitektur Sistem
3.1. Pola Arsitektur
Proyek ini mengadopsi arsitektur hibrida:

Backend: Menggunakan pola Model-View-Controller (MVC) yang disediakan oleh Laravel.
Model: Merepresentasikan struktur data dan logika bisnis (terdapat di app/Models/).
View: Direpresentasikan oleh halaman Inertia.js yang di-render melalui resources/views/app.blade.php.
Controller: Menangani permintaan HTTP, logika aplikasi, dan berinteraksi dengan Model (terdapat di app/Http/Controllers/).
Frontend: Menggunakan pendekatan Single-Page Application (SPA) yang difasilitasi oleh Inertia.js. Halaman dan komponen UI dibangun menggunakan JavaScript (kemungkinan besar Vue.js, dilihat dari adanya quasar-variables.sass dan struktur resources/js).
3.2. Tumpukan Teknologi (Technology Stack)
Backend: PHP 8.x, Laravel 10.x
Frontend: JavaScript, Inertia.js, Vite, Tailwind CSS, Quasar Framework (untuk komponen UI)
Database: Dapat dikonfigurasi (MySQL, PostgreSQL, dll), sesuai config/database.php.
Web Server: Nginx atau Apache (dilihat dari public/.htaccess).
Testing: PHPUnit.
4. Desain Data
Desain data adalah inti dari aplikasi ini. Berikut adalah rincian model dan relasinya.

4.1. Model Entitas (Entity Models)
User (app/Models/User.php)

Tujuan: Merepresentasikan pengguna yang dapat login ke sistem.
Atribut Penting: id, name, email, password, created_at, updated_at.
Relasi:
Memiliki banyak Transaction (One-to-Many).
Memiliki banyak Party (One-to-Many).
Memiliki banyak TransactionCategory (One-to-Many).
Party (app/Models/Party.php)

Tujuan: Merepresentasikan pihak ketiga (pelanggan, vendor, dll).
Atribut Penting: id, user_id, name, contact_person, phone, address, created_at, updated_at.
Relasi:
Dimiliki oleh satu User (Many-to-One).
Memiliki banyak Transaction (One-to-Many).
TransactionCategory (app/Models/TransactionCategory.php)

Tujuan: Mengelompokkan jenis-jenis transaksi.
Atribut Penting: id, user_id, name, type (enum: 'income', 'expense'), created_at, updated_at.
Relasi:
Dimiliki oleh satu User (Many-to-One).
Memiliki banyak Transaction (One-to-Many).
Transaction (app/Models/Transaction.php)

Tujuan: Model utama yang mencatat semua aktivitas keuangan.
Atribut Penting: id, user_id, party_id (nullable), transaction_category_id, description, amount, transaction_date, created_at, updated_at.
Relasi:
Dimiliki oleh satu User (Many-to-One).
Dimiliki oleh satu TransactionCategory (Many-to-One).
Dimiliki oleh satu Party (Many-to-One, opsional).
Setting (app/Models/Setting.php)

Tujuan: Menyimpan pengaturan aplikasi, seperti format mata uang, bahasa, dll.
Atribut Penting: id, key, value.
4.2. Diagram Relasi Entitas (Textual ERD)
[User] 1--* [Transaction] *--1 [TransactionCategory]
  |                               |
  |                               *
  '--* [Party] 1------------------* [Transaction] (opsional)
5. Desain Komponen & Modul
Aplikasi ini dapat dipecah menjadi beberapa modul fungsional.

5.1. Modul Autentikasi
File Terkait: routes/auth.php, app/Http/Controllers/Auth/*, app/Http/Middleware/Auth.php.
Fungsionalitas: Registrasi, Login, Logout, Lupa Password.
Halaman UI: Login.vue, Register.vue (di dalam resources/js/pages/Auth/).
5.2. Modul Dashboard
File Terkait: app/Http/Controllers/App/DashboardController.php (perlu dibuat), resources/js/pages/Dashboard.vue.
Fungsionalitas: Menampilkan ringkasan keuangan setelah login (misal: total pemasukan, total pengeluaran, saldo, grafik tren).
5.3. Modul Transaksi (CRUD)
File Terkait: app/Http/Controllers/App/TransactionController.php, resources/js/pages/Transactions/Index.vue, resources/js/pages/Transactions/Create.vue, resources/js/pages/Transactions/Edit.vue.
Fungsionalitas: Menambah, melihat, mengubah, dan menghapus data transaksi. Termasuk fungsionalitas pencarian dan filter.
5.4. Modul Kategori (CRUD)
File Terkait: app/Http/Controllers/App/TransactionCategoryController.php, resources/js/pages/Categories/.
Fungsionalitas: Manajemen kategori untuk pemasukan dan pengeluaran.
5.5. Modul Pihak Ketiga (CRUD)
File Terkait: app/Http/Controllers/App/PartyController.php, resources/js/pages/Parties/.
Fungsionalitas: Manajemen data pelanggan, vendor, atau kontak lainnya.
5.6. Modul Admin
File Terkait: app/Http/Controllers/Admin/*.
Fungsionalitas: Kemungkinan untuk manajemen pengguna, melihat log sistem, atau pengaturan global aplikasi.
6. Desain Antarmuka Pengguna (UI/UX)
Framework: Quasar di atas Vue.js, dengan styling dari Tailwind CSS.
Struktur Halaman: Menggunakan sistem layout Inertia.js (resources/js/layouts/). Akan ada layout utama (AuthenticatedLayout.vue) yang berisi navigasi, header, dan footer.
Komponen: Komponen UI yang dapat digunakan kembali (seperti Tombol, Input, Tabel, Modal) akan ditempatkan di resources/js/components/.
Responsif: Desain harus mobile-first dan beradaptasi dengan baik di berbagai ukuran layar.
7. Lampiran: Contoh Prompting Berdasarkan SDD
Dengan SDD ini, Anda bisa membuat prompt yang sangat spesifik.

Contoh 1: Menambah Fitur Filter Transaksi

"Berdasarkan Desain Komponen & Modul (5.3) dan Desain Data (4.1), saya ingin menambahkan fungsionalitas filter pada halaman daftar transaksi (resources/js/pages/Transactions/Index.vue).

Tambahkan dua input tanggal ("Tanggal Mulai" dan "Tanggal Selesai") di atas tabel transaksi.
Tambahkan sebuah dropdown untuk memfilter berdasarkan TransactionCategory. Dropdown ini harus diisi dengan data dari TransactionCategoryController.
Ketika tombol "Filter" diklik, data transaksi yang ditampilkan di halaman harus diperbarui sesuai dengan rentang tanggal dan kategori yang dipilih.
Modifikasi method index di TransactionController.php untuk menerima parameter filter ini dan sesuaikan query Eloquent untuk memfilter data Transaction berdasarkan transaction_date dan transaction_category_id."
Contoh 2: Membuat Controller dan Route Baru

"Mengacu pada Desain Komponen & Modul (5.4), tolong buatkan implementasi penuh untuk CRUD Kategori Transaksi.

Buat file controller baru di app/Http/Controllers/App/TransactionCategoryController.php menggunakan php artisan make:controller App/TransactionCategoryController --resource --model=TransactionCategory.
Implementasikan method index, store, update, dan destroy di dalam controller tersebut. Gunakan validasi yang sesuai untuk input nama dan tipe kategori.
Daftarkan resource route baru di routes/web.php untuk controller ini, pastikan route tersebut dilindungi oleh middleware auth. Contoh: Route::resource('categories', TransactionCategoryController::class);"
Contoh 3: Memperbaiki Bug Relasi

"Berdasarkan Desain Data (4.1), saya menemukan bug. Saat menghapus sebuah TransactionCategory, transaksi yang terkait dengannya tidak ikut terhapus dan menyebabkan error. Tolong modifikasi file migrasi 0001_01_01_000007_create_transactions_table.php. Pada definisi foreign key untuk transaction_category_id, tambahkan onDelete('cascade') atau onDelete('set null') agar relasi data tetap konsisten. Setelah itu, jelaskan langkah-langkah untuk me-refresh migrasi di environment development."