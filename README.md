📚 📌 1. BASIC FEATURES (Wajib Ada di Semua LMS) (Fokus ini dulu)
✅ 1. User Authentication

Login

Register

Logout

Forgot password

✅ 2. Dashboard

Statistik cepat (jumlah buku, anggota, peminjaman aktif)

✅ 3. Book Management

Tambah buku

Edit buku

Hapus buku

List & search buku

Detail buku (judul, pengarang, kategori, stok, ISBN, tahun, dll.)

✅ 4. Member Management

Tambah member

Edit member

Hapus member

List & search member

Status aktif / nonaktif

✅ 5. Borrowing (Peminjaman)

Buat transaksi pinjam buku

Cek ketersediaan buku

Atur tanggal pinjam & tanggal kembali

Update status peminjaman

✅ 6. Returning (Pengembalian)

Pengembalian buku

Update stok kembali

Status returned

📚 📌 2. STANDARD FEATURES (Untuk sistem perpustakaan lengkap)
🔹 7. Fine Management (Denda)

Otomatis hitung denda berdasarkan keterlambatan

Pembayaran denda

Riwayat denda

🔹 8. Categories & Authors

Manajemen kategori buku

Manajemen penulis

Filter berdasarkan kategori / penulis

🔹 9. Book Copies / Stock System

Jika 1 judul punya banyak eksemplar.

🔹 10. Reports (Laporan)

Laporan peminjaman

Laporan pengembalian

Laporan buku yang sering dipinjam

Export PDF / Excel

📚 📌 3. ADVANCED FEATURES (Untuk perpustakaan modern)
🔸 11. Reservation System (Pemesanan Buku)

User bisa booking buku yang sedang dipinjam orang lain

Automatic notification saat buku kembali

🔸 12. Email Notifications

Pengingat jatuh tempo

Notif pengembalian / denda

🔸 13. Barcode / QR Code Integration

Scan ISBN

Scan Kartu anggota

Scan transaksi peminjaman

🔸 14. Digital Books / e-Library

Upload PDF atau link e-book

Fitur baca online

🔸 15. Role & Permission (Admin / Petugas / User)

Admin: akses penuh

Petugas: akses transaksi

User: hanya pinjam & lihat katalog

🔸 16. Activity Log

Catatan semua kegiatan user

🔸 17. API Integration

API untuk sistem lain (misal integrasi kampus)

📚 📌 4. EXTRA — Fiturnya Jika Pakai Livewire

Jika kamu pakai Livewire, fitur ini cocok sekali:

Search buku real-time

Pagination tanpa reload

Tambah/Edit buku dalam modal Livewire

Notifikasi realtime (toast)

Update stok otomatis saat transaksi terjadi

Validasi Livewire langsung (on typing)

🧱 📌 5. STRUKTUR FITUR (MODULE-BASED)

Agar rapi, biasanya dibagi modul seperti ini:

Module: Books

List

Create

Edit

Delete

Categories

Authors

Stock

Module: Members

List

Create

Edit

Delete

Module: Borrowing

Borrow a book

Return a book

Penalty/Fine

Module: Settings

Roles & permission

Library profile

Notification settings

Module: Reports

Borrowing report

Member activity report

Most borrowed books