# 📚 Library Management System (LMS)

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-38B2AC?style=for-the-badge&logo=tailwind-css)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql)

Sistem manajemen perpustakaan modern yang dibangun dengan **Laravel 12** dan **Tailwind CSS**. Aplikasi ini menyediakan antarmuka yang intuitif untuk mengelola buku, anggota, dan transaksi peminjaman secara efisien.

> **Catatan:** Projek ini adalah bentuk pembelajaran Dimas dalam memahami Laravel secara mendalam, menggunakan Cache/Redis dan Frontend Structure yang rapih. Dibantu oleh Gemini 3, Claude Opus 4.5 dan Github Copilot.

---

## ✨ Fitur Utama

### 📖 Manajemen Buku
- **CRUD Operasi**: Tambah, edit, hapus, dan lihat detail buku.
- **Pelacakan Stok**: Kelola stok fisik dan stok tersedia secara otomatis.
- **Kategorisasi**: Pengelompokan buku berdasarkan kategori, penulis, dan penerbit.

### 👥 Manajemen Anggota
- **Profil Anggota**: Simpan detail lengkap anggota.
- **Status**: Monitor status anggota (Aktif, Tidak Aktif, Ditangguhkan).
- **Riwayat**: Lihat riwayat peminjaman setiap anggota.

### 🔄 Sirkulasi (Peminjaman & Pengembalian)
- **Peminjaman**: Proses mudah untuk meminjamkan buku.
- **Pengembalian**: Update stok otomatis dan perhitungan denda.
- **Indikator Status**: Visualisasi status (Dipinjam, Dikembalikan, Terlambat).

### 💸 Manajemen Denda
- **Kalkulasi Otomatis**: Denda dihitung Rp 5.000/hari keterlambatan.
- **Pembayaran**: Catat pembayaran denda dan status lunas.

### 📊 Dashboard
- **Statistik Real-time**: Total buku, anggota aktif, dan peminjaman berjalan.
- **Aktivitas Terbaru**: Monitor transaksi terkini.

---

## 🛠️ Tech Stack

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| **Framework** | Laravel | 12.0 |
| **Database** | MySQL | 8.0+ |
| **Frontend** | Blade Templates | - |
| **Styling** | Tailwind CSS | 4.0 |
| **Design** | Glassmorphism | - |
| **Build Tool** | Vite | - |
| **Cache** | Redis | (via Predis) |

---

## 🚀 Panduan Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di local:

### 1. Clone Repository
```bash
git clone <repository-url>
cd Library-Management-System
```

### 2. Install Dependencies
```bash
# PHP Dependencies
composer install

# Node.js Dependencies
npm install
```

### 3. Konfigurasi Environment
Copy file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:

```bash
cp .env.example .env
```

Edit `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management_system
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Setup Database
```bash
# Generate App Key
php artisan key:generate

# Run Migrations & Seeders
php artisan migrate --seed
```

### 5. Jalankan Aplikasi
Jalankan server Laravel dan Vite (dalam 2 terminal berbeda):

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Akses aplikasi di `http://localhost:8000`.

**Akun Admin Default:**
- **Email:** `admin@example.com`
- **Password:** `password`

---

## 📂 Struktur Project

```
app/
├── Http/Controllers/    # Logika aplikasi (Books, Members, Borrowings)
├── Models/              # Eloquent Models
└── View/Components/     # Blade Components
database/
├── migrations/          # Schema Database
└── seeders/             # Data Dummy
resources/
├── css/                 # Tailwind CSS
└── views/
    ├── admin/           # Halaman Admin
    ├── auth/            # Halaman Login/Register
    ├── layouts/         # Master Layouts
    └── components/      # Komponen UI
routes/
└── web.php              # Definisi Route
```

---

## 🐛 Troubleshooting Common Issues

**Error: "SQLSTATE[HY000] [2002] Connection refused"**
> Pastikan layanan MySQL sudah berjalan (XAMPP/Laragon/Docker).

**Error: "Class not found" atau "Route not found"**
> Jalankan perintah berikut untuk membersihkan cache:
> ```bash
> php artisan optimize:clear
> ```

**Tampilan CSS Berantakan**
> Pastikan `npm run dev` sedang berjalan atau jalankan `npm run build` untuk production.

---

## 📄 Lisensi

Project ini bersifat open-source di bawah lisensi [MIT](https://opensource.org/licenses/MIT).


