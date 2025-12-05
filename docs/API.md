# Dokumentasi API / Rute

Karena aplikasi ini utamanya dirender di sisi server menggunakan template Blade, "API" di sini merujuk pada rute web yang didefinisikan di `routes/web.php`.

## 🔐 Otentikasi (Authentication)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/login` | `login` | Tampilkan form login |
| POST | `/login` | - | Proses login |
| POST | `/logout` | `logout` | Keluarkan pengguna (Logout) |
| GET | `/register` | `register` | Tampilkan form registrasi |
| POST | `/register` | - | Proses registrasi |

## 📊 Dasbor (Dashboard)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/dashboard` | `Dashboard` | Dasbor admin utama |

## 📚 Sumber Daya Buku (Books Resource)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/books` | `books.index` | Daftar semua buku (dengan paginasi & pencarian) |
| GET | `/books/create` | `books.create` | Tampilkan form tambah buku |
| POST | `/books` | `books.store` | Simpan buku baru |
| GET | `/books/{book}` | `books.show` | Tampilkan detail buku |
| GET | `/books/{book}/edit` | `books.edit` | Tampilkan form edit buku |
| PUT | `/books/{book}` | `books.update` | Perbarui detail buku |
| DELETE | `/books/{book}` | `books.destroy` | Hapus buku |

## 👥 Sumber Daya Anggota (Members Resource)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/members` | `members.index` | Daftar semua anggota |
| GET | `/members/create` | `members.create` | Tampilkan form tambah anggota |
| POST | `/members` | `members.store` | Simpan anggota baru |
| GET | `/members/{member}` | `members.show` | Tampilkan detail anggota |
| GET | `/members/{member}/edit` | `members.edit` | Tampilkan form edit anggota |
| PUT | `/members/{member}` | `members.update` | Perbarui detail anggota |
| DELETE | `/members/{member}` | `members.destroy` | Hapus anggota |

## 📖 Sumber Daya Peminjaman (Borrowings Resource)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/borrowings` | `borrowings.index` | Daftar transaksi peminjaman |
| GET | `/borrowings/create` | `borrowings.create` | Tampilkan form peminjaman |
| POST | `/borrowings` | `borrowings.store` | Simpan transaksi baru |
| GET | `/borrowings/{borrowing}` | `borrowings.show` | Tampilkan detail transaksi |
| GET | `/borrowings/{borrowing}/edit` | `borrowings.edit` | Tampilkan form edit transaksi |
| PUT | `/borrowings/{borrowing}` | `borrowings.update` | Perbarui transaksi |
| DELETE | `/borrowings/{borrowing}` | `borrowings.destroy` | Hapus transaksi |
| PUT | `/borrowings/{borrowing}/return` | `borrowings.return` | Proses pengembalian buku |

## 💸 Sumber Daya Denda (Fines Resource)
| Metode | URI | Nama | Deskripsi |
|--------|-----|------|-----------|
| GET | `/fines` | `fines.index` | Daftar denda |
| GET | `/fines/{fine}` | `fines.show` | Tampilkan detail denda |
| GET | `/fines/{fine}/edit` | `fines.edit` | Tampilkan form edit denda |
| PUT | `/fines/{fine}` | `fines.update` | Perbarui detail denda |
| DELETE | `/fines/{fine}` | `fines.destroy` | Hapus denda |
| PUT | `/fines/{fine}/pay` | `fines.pay` | Tandai denda sebagai lunas |
