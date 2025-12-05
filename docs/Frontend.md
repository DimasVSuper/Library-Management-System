# Dokumentasi Frontend

## 🎨 Sistem Desain

Aplikasi ini menggunakan bahasa desain **Glassmorphism** modern yang dibangun dengan **Tailwind CSS**.

### Karakteristik Desain Utama:
- **Latar Belakang**: Latar belakang putih/gelap semi-transparan (`bg-white/70`, `dark:bg-gray-800/80`).
- **Efek Blur**: Backdrop blur (`backdrop-blur-md`) untuk menciptakan kedalaman.
- **Batas (Borders)**: Batas halus (`border-white/20`) untuk mendefinisikan tepi tanpa terlihat kasar.
- **Bayangan (Shadows)**: Bayangan lembut dan besar (`shadow-lg`, `shadow-xl`) untuk elemen yang mengambang.
- **Gradien**: Penggunaan gradien (Biru ke Ungu) untuk tindakan utama dan header.
- **Sudut Membulat**: Radius batas yang besar (`rounded-2xl`, `rounded-xl`) untuk UI yang ramah.
- **Mode Gelap**: Didukung sepenuhnya dengan varian `dark:` untuk semua komponen.

---

## 📂 Struktur Tampilan

Tampilan diatur dalam `resources/views/admin/` sesuai dengan controller.

### 1. Layouts (`resources/views/layouts/`)
- `admin.blade.php`: Layout utama untuk panel admin. Berisi Sidebar, Topbar, dan area Konten.
- `app.blade.php`: Layout untuk halaman publik/otentikasi.

### 2. Dasbor (`resources/views/admin/dashboard.blade.php`)
- Menampilkan kartu ringkasan (Total Buku, Anggota, Peminjaman Aktif).
- Menggunakan tata letak grid untuk responsivitas.

### 3. Buku (`resources/views/admin/books/`)
- `index.blade.php`: Tampilan tabel buku dengan bilah pencarian dan paginasi.
- `create.blade.php`: Form untuk menambah buku baru.
- `edit.blade.php`: Form untuk mengedit buku yang ada.
- `show.blade.php`: Tampilan detail buku.

### 4. Anggota (`resources/views/admin/members/`)
- `index.blade.php`: Tampilan tabel anggota dengan lencana status (Aktif/Tidak Aktif).
- `create.blade.php`: Form pendaftaran untuk anggota baru.
- `edit.blade.php`: Perbarui detail anggota.
- `show.blade.php`: Profil anggota dan riwayat peminjaman.

### 5. Peminjaman (`resources/views/admin/borrowings/`)
- `index.blade.php`: Daftar transaksi dengan indikator status (Dipinjam/Dikembalikan/Terlambat).
- `create.blade.php`: Form untuk membuat pinjaman (Pilih Anggota & Buku).
- `show.blade.php`: Detail transaksi dengan tindakan "Kembalikan Buku".

### 6. Denda (`resources/views/admin/fines/`)
- `index.blade.php`: Daftar denda dengan tombol "Bayar" untuk denda yang belum lunas.
- `show.blade.php`: Info detail denda dan status pembayaran.
- `edit.blade.php`: Penyesuaian manual jumlah denda atau status.

---

## 🧩 Komponen

### Sidebar
- Sidebar responsif dengan animasi slide di ponsel.
- Penyorotan status aktif untuk rute saat ini.
- Gaya Glassmorphism.

### Bilah Pencarian (Search Bar)
- Komponen pencarian terpadu di semua halaman indeks.
- Mempertahankan query pencarian di input setelah pengiriman.

### Peringatan (Alerts)
- Pesan flash Sukses (Hijau) dan Kesalahan (Merah).
- Diberi gaya dengan glassmorphism dan ikon.
