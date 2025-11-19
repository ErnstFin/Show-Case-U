## Show-Case-U

Generator resume dan pengelola arsip file sederhana berbasis Laravel 11 + Breeze.

### Fitur Utama

- Halaman *Home* setelah login/register menampilkan riwayat CV ATS terbaru dan tombol **Buat CV ATS Baru** yang membuka Resume Builder.
- Dashboard pengguna berisi ringkasan file pribadi dan akses cepat ke halaman penting.
- Dashboard admin menampilkan metrik global, daftar file terbaru, serta pengguna baru.
- Dukungan *role* (`user` / `admin`) dengan middleware khusus.
- Database bawaan memakai SQLite sehingga projek langsung jalan tanpa MySQL.

### Persiapan Cepat

```bash
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

> **Catatan DB:** Setelah menyalin `.env.example`, ubah `DB_CONNECTION=sqlite` dan set `DB_DATABASE=database/database.sqlite`. Pastikan file `database/database.sqlite` ada (boleh file kosong). Jika ingin MySQL, sesuaikan variabel `DB_*` dengan server Anda.

### Membuat CV ATS dari Home

1. Login atau register, kemudian buka halaman `Home`.
2. Klik tombol **Buat CV ATS Baru** untuk membuka Resume Builder.
3. Isi data diri, pengalaman, dan skill; klik **Download CV**.
4. File PDF akan otomatis tersimpan di `Riwayat CV ATS` sehingga Anda bisa mengunduhnya kembali kapan saja.

### Akun Bawaan

| Role  | Email             | Password   |
|-------|-------------------|------------|
| Admin | `admin@example.com` | `Admin!234` |
| User  | `test@example.com`  | `password`  |

Gunakan akun admin untuk mencoba dashboard admin (`/dashboard/admin`). Semua pengguna (termasuk admin) otomatis diarahkan ke `/home` setelah login/register.

### Testing

```bash
php artisan test
```

Pastikan dependensi sudah terpasang dan database telah dimigrasi sebelum menjalankan test suite.*** End Patch
