# 📚 Library Management System (LMS)

Sistem manajemen perpustakaan modern yang dibangun dengan **Laravel 12** dan **Tailwind CSS** untuk mengelola buku, anggota, dan transaksi peminjaman dengan antarmuka yang intuitif.

> **Catatan:** Projek ini adalah bentuk pembelajaran Dimas dalam memahami Laravel secara mendalam, menggunakan Cache/Redis dan Frontend Structure yang rapih. Dibantu oleh Gemini 3, Claude Opus 4.5 dan Github Copilot.

---

## 🚀 Quick Start

### Step 1️⃣ : Clone Repository & Install Dependencies

```bash
# Clone project (jika belum)
git clone <repository-url>
cd Library-Management-System

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Generate application key
php artisan key:generate
```

### Step 2️⃣ : Setup Database

**1. Buat file `.env` (copy dari `.env.example`)**
```bash
cp .env.example .env
```

**2. Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_management
DB_USERNAME=root
DB_PASSWORD=
```

**3. Buat database MySQL**
```bash
# Di phpMyAdmin atau command line MySQL
CREATE DATABASE library_management;
```

**4. Jalankan migrations**
```bash
php artisan migrate
```

### Step 3️⃣ : Build Frontend Assets

```bash
# Development mode
npm run dev

# Production mode
npm run build
```

### Step 4️⃣ : Start Development Server

```bash
# Terminal 1 - Run Laravel server
php artisan serve

# Terminal 2 - Run Vite dev server (jika tidak sudah running)
npm run dev
```

Server akan berjalan di: **http://localhost:8000**

### Step 5️⃣ : Login & Mulai Gunakan

**Default Admin Account:**
- Email: `admin@example.com`
- Password: `password`

Atau buat akun baru di halaman **Register**: `http://localhost:8000/register`

---

## 📋 Fitur yang Sudah Diimplementasi

### ✅ Basic Features (Sudah Lengkap)

#### 1. **User Authentication**
- ✅ Register (Buat akun baru)
- ✅ Login (Masuk dengan email & password)
- ✅ Logout (Keluar dari sistem)
- ✅ Remember Me (Ingat akun saya)
- ✅ Session Management

#### 2. **Dashboard**
- ✅ Statistik cepat (Total Buku, Total Member, Peminjaman Aktif)
- ✅ Navbar dengan user info
- ✅ Sidebar navigation dengan menu
- ✅ Dark mode support
- ✅ Responsive design

#### 3. **Book Management (Manajemen Buku)**
- ✅ List semua buku dengan search & pagination
- ✅ Tambah buku (Create)
- ✅ Edit buku (Update)
- ✅ Hapus buku (Delete)
- ✅ View detail buku
- ✅ Tracking stok buku (stok total & stok tersedia)
- ✅ Fields: Title, Author, ISBN, Category, Year, Price, Stock

#### 4. **Member Management (Manajemen Anggota)**
- ✅ List semua member dengan search & pagination
- ✅ Tambah member (Create)
- ✅ Edit member (Update)
- ✅ Hapus member (Delete)
- ✅ View detail member
- ✅ Status management (Active, Inactive, Suspended)
- ✅ Fields: Name, Email, Phone, Address, City, Join Date

#### 5. **Borrowing (Sistem Peminjaman)**
- ✅ Buat transaksi peminjaman buku
- ✅ Cek ketersediaan stok buku otomatis
- ✅ Set tanggal pinjam & tanggal kembali (default 7 hari)
- ✅ List semua peminjaman dengan status
- ✅ View detail transaksi peminjaman
- ✅ Edit tanggal peminjaman
- ✅ Delete transaksi peminjaman (restore stok)

#### 6. **Returning (Sistem Pengembalian)**
- ✅ Return/kembalikan buku
- ✅ Update stok otomatis saat buku dikembalikan
- ✅ Hitung denda otomatis (Rp 5000/hari keterlambatan)
- ✅ Status transaksi: Borrowed, Returned, Overdue
- ✅ Validasi pengembalian (tidak bisa kembali jika sudah di-return)

#### 7. **Fine Management (Manajemen Denda)**
- ✅ Otomatis generate denda saat pengembalian terlambat
- ✅ List semua denda dengan status (Paid/Unpaid)
- ✅ Detail informasi denda (Member, Buku, Hari Terlambat)
- ✅ Fitur pembayaran denda (Mark as Paid)
- ✅ Edit & Hapus data denda

#### 8. **System Optimization**
- ✅ **Redis Caching**: Implementasi caching pada semua modul utama (Books, Members, Borrowings, Fines) untuk performa tinggi.
- ✅ **Search Engine**: Fitur pencarian real-time di semua modul.

---

## 🛠️ Tech Stack

| Layer | Technology | Version |
|-------|-----------|---------|
| **Framework** | Laravel | 12.0 |
| **Database** | MySQL | 8.0+ |
| **Frontend** | Blade Templates | - |
| **CSS Framework** | Tailwind CSS | 3.4 |
| **Design Style** | Glassmorphism | - |
| **Build Tool** | Vite | - |
| **Cache** | Redis | (via Predis) |
| **Authentication** | Laravel Auth | - |

---

## 📁 Project Structure

```
Library-Management-System/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── Auth/
│   │       ├── BookController.php
│   │       ├── MemberController.php
│   │       ├── BorrowingController.php
│   │       └── FineController.php
│   └── Models/
│       ├── User.php
│       ├── Book.php
│       ├── Member.php
│       ├── Borrowing.php
│       └── Fine.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── books/
│   │   │   ├── members/
│   │   │   ├── borrowings/
│   │   │   └── fines/
│   │   └── auth/
├── routes/
│   └── web.php
```

---

## 🔄 Database Schema

### Users Table
```sql
id, name, email, password, remember_token, created_at, updated_at
```

### Books Table
```sql
id, title, author, isbn (unique), category, year, price, 
stock, available_stock, notes, created_at, updated_at
```

### Members Table
```sql
id, name, email, phone, address, city, join_date, 
status (enum), notes, created_at, updated_at
```

### Borrowings Table
```sql
id, member_id (FK), book_id (FK), borrow_date, due_date, 
returned_date (nullable), status (enum), fine_amount, notes, 
created_at, updated_at
```

### Fines Table
```sql
id, borrowing_id (FK), amount, days_overdue, status (enum: paid, unpaid), 
paid_at (nullable), notes, created_at, updated_at
```

---

## 🎯 Routes

### Authentication
- `GET/POST /login` - Login
- `GET/POST /register` - Register
- `POST /logout` - Logout

### Dashboard
- `GET /dashboard` - Dashboard utama

### Books
- `GET /books` - List buku
- `GET /books/create` - Form tambah buku
- `POST /books` - Store buku baru
- `GET /books/{id}` - Detail buku
- `GET /books/{id}/edit` - Form edit buku
- `PUT /books/{id}` - Update buku
- `DELETE /books/{id}` - Hapus buku

### Members
- `GET /members` - List member
- `GET /members/create` - Form tambah member
- `POST /members` - Store member baru
- `GET /members/{id}` - Detail member
- `GET /members/{id}/edit` - Form edit member
- `PUT /members/{id}` - Update member
- `DELETE /members/{id}` - Hapus member

### Borrowing
- `GET /borrowings` - List peminjaman
- `GET /borrowings/create` - Form buat peminjaman
- `POST /borrowings` - Store peminjaman baru
- `GET /borrowings/{id}` - Detail peminjaman
- `GET /borrowings/{id}/edit` - Form edit peminjaman
- `PUT /borrowings/{id}` - Update peminjaman
- `DELETE /borrowings/{id}` - Hapus peminjaman
- `PUT /borrowings/{id}/return` - Return buku & hitung denda

### Fines
- `GET /fines` - List denda
- `GET /fines/{id}` - Detail denda
- `GET /fines/{id}/edit` - Form edit denda
- `PUT /fines/{id}` - Update denda
- `DELETE /fines/{id}` - Hapus denda
- `PUT /fines/{id}/pay` - Bayar denda

---

## 🎨 UI/UX Features

- 🌙 **Dark Mode Support** - Tema terang & gelap
- 📱 **Responsive Design** - Optimal di desktop, tablet, mobile
- 🎯 **Intuitive Navigation** - Sidebar menu yang jelas
- ✨ **Glassmorphism Design** - Tampilan modern dengan efek blur dan transparansi
- ⚡ **Redis Optimization** - Loading data super cepat dengan caching
- 🔍 **Global Search** - Pencarian data di semua modul

---

## 📚 Next Features (Akan Datang)

### 🔹 Standard Features
- Categories & Authors Management
- Reports & Export (PDF/Excel)
- Book Copies System

### 🔸 Advanced Features
- Reservation System (Pemesanan buku)
- Email Notifications
- Barcode/QR Code Integration
- Role & Permission System
- Activity Logging

---

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [2002] Connection refused"
**Solusi:** Pastikan MySQL sudah running
```bash
# Windows - Start XAMPP MySQL
# Mac/Linux
sudo systemctl start mysql
```

### Error: "Class not found" atau "Route not found"
**Solusi:** Clear cache Laravel
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:cache
```

### CSS/JS tidak loading
**Solusi:** Rebuild assets
```bash
npm run build
# atau untuk development
npm run dev
```

### Database migration error
**Solusi:** Reset dan migrate ulang
```bash
php artisan migrate:refresh
# atau dengan fresh (drop semua tabel)
php artisan migrate:fresh
```

t