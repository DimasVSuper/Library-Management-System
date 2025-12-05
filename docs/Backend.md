# Dokumentasi Backend

## 🗄️ Skema Database

### 1. Tabel Users (Pengguna)
Menyimpan akun administrator untuk mengakses sistem.
- `id`: Primary Key
- `name`: Nama lengkap pengguna
- `email`: Alamat email unik
- `password`: Password yang di-hash
- `remember_token`: Untuk fungsionalitas "Ingat Saya"
- `timestamps`: created_at, updated_at

### 2. Tabel Books (Buku)
Menyimpan koleksi buku perpustakaan.
- `id`: Primary Key
- `title`: Judul buku
- `author`: Nama penulis
- `isbn`: Kode ISBN unik
- `category`: Kategori buku (Fiksi, Sains, dll.)
- `year`: Tahun terbit
- `publisher`: Nama penerbit
- `stock`: Total stok fisik
- `available_stock`: Stok yang tersedia untuk dipinjam
- `price`: Harga buku (untuk biaya penggantian)
- `timestamps`: created_at, updated_at

### 3. Tabel Members (Anggota)
Menyimpan anggota perpustakaan yang dapat meminjam buku.
- `id`: Primary Key
- `name`: Nama lengkap anggota
- `email`: Alamat email unik
- `phone`: Nomor kontak
- `address`: Alamat fisik
- `city`: Kota tempat tinggal
- `join_date`: Tanggal pendaftaran
- `status`: 'active' (aktif), 'inactive' (tidak aktif), atau 'suspended' (ditangguhkan)
- `notes`: Catatan tambahan
- `timestamps`: created_at, updated_at

### 4. Tabel Borrowings (Peminjaman)
Mencatat transaksi peminjaman.
- `id`: Primary Key
- `member_id`: Foreign Key -> Members
- `book_id`: Foreign Key -> Books
- `borrow_date`: Tanggal pinjam
- `due_date`: Tanggal jatuh tempo pengembalian
- `returned_date`: Tanggal pengembalian aktual (bisa null)
- `status`: 'borrowed' (dipinjam), 'returned' (dikembalikan), 'overdue' (terlambat)
- `fine_amount`: Denda yang dihitung (jika ada)
- `notes`: Catatan transaksi
- `timestamps`: created_at, updated_at

### 5. Tabel Fines (Denda)
Mengelola denda yang dihasilkan dari pengembalian terlambat.
- `id`: Primary Key
- `borrowing_id`: Foreign Key -> Borrowings
- `amount`: Total jumlah denda
- `days_overdue`: Jumlah hari keterlambatan
- `status`: 'paid' (lunas) atau 'unpaid' (belum lunas)
- `paid_at`: Timestamp kapan pembayaran dilakukan
- `notes`: Catatan pembayaran
- `timestamps`: created_at, updated_at

---

## 🧠 Logika & Fitur Utama

### 1. Logika Peminjaman (`BorrowingController`)
- **Validasi**: Memeriksa apakah buku memiliki `available_stock > 0`.
- **Cek Peminjaman Aktif**: Memastikan anggota tidak dapat meminjam buku yang sama dua kali secara bersamaan.
- **Manajemen Stok**: Mengurangi `available_stock` saat peminjaman.

### 2. Logika Pengembalian (`BorrowingController::return`)
- **Cek Tanggal**: Membandingkan `hari ini` dengan `due_date`.
- **Perhitungan Denda**: Jika `hari ini > due_date`, hitung denda: `(hari terlambat * 5000)`.
- **Pembuatan Denda**: Secara otomatis membuat catatan `Fine` jika ada denda.
- **Pemulihan Stok**: Menambah `available_stock` saat pengembalian.

### 3. Manajemen Denda (`FineController`)
- **Pembayaran**: Memungkinkan menandai denda sebagai 'lunas', mencatat timestamp.
- **Pembuatan Otomatis**: Denda dibuat secara otomatis, tetapi dapat diedit secara manual jika diperlukan.

### 4. Optimasi Redis
Untuk meningkatkan performa, sistem menggunakan Redis untuk caching hasil query.
- **Tags**: Menggunakan cache tags (`books`, `members`, `borrowings`, `fines`) untuk invalidasi cache yang granular.
- **Strategi**:
  - Metode `index` men-cache hasil paginasi selama 10 menit.
  - Metode `store`, `update`, `destroy` menghapus cache tags yang relevan untuk memastikan konsistensi data.
- **Pencarian**: Hasil pencarian juga di-cache dengan kunci unik berdasarkan query pencarian.

---

## 🔒 Keamanan
- **Otentikasi**: Menggunakan sistem Auth bawaan Laravel.
- **Validasi**: Semua input divalidasi menggunakan Form Requests atau validasi Controller.
- **Perlindungan CSRF**: Semua form dilindungi dari serangan CSRF.
