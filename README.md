# Songfess Kelazzz F

## Overview
Songfess Kelazzz F adalah sebuah website yang memungkinkan pengguna untuk mengirimkan permintaan lagu beserta pesan pribadi kepada teman mereka. Pengguna dapat mengirimkan entri baru, menelusuri entri yang ada berdasarkan nama penerima, serta menikmati antarmuka yang menarik dengan fitur pencarian lagu otomatis menggunakan API Spotify.

## Project Structure
```
songfess-website
├── src
│   ├── index.php          # Halaman utama yang menampilkan entri songfess
│   ├── form.php           # Formulir untuk mengirimkan entri songfess baru
│   ├── browse.php         # Fungsi pencarian entri songfess berdasarkan penerima
│   ├── css
│   │   ├── style.css      # Gaya tampilan utama
│   │   ├── form.css       # Gaya tampilan untuk formulir
│   │   ├── browse.css     # Gaya tampilan untuk pencarian
│   │   └── detail.css     # Gaya tampilan untuk detail entri
│   ├── js
│   │   ├── browse.php     # Fungsi untuk pencarian lagu dan entri
│   │   ├── detail.php     # Halaman detail songfess
│   │   └── form.php       # Pemrosesan formulir songfess
│   └── includes
│       └── db.php        # Koneksi database
├── assets
│   ├── images            # Berisi file gambar dan ikon
│   ├── musik.mp3         # Contoh file musik
├── README.md              # Dokumentasi proyek
└── .gitignore             # File yang diabaikan dalam version control
```

## Features
- **Submit Songfess**: Pengguna dapat mengirimkan permintaan lagu beserta pesan melalui formulir khusus.
- **Browse Songfess**: Pengguna dapat mencari entri songfess berdasarkan nama penerima.
- **Dropdown Pencarian Lagu**: Saat pengguna mengetikkan judul lagu, sistem akan menampilkan daftar lagu yang sesuai menggunakan API Spotify.
- **Responsive Design**: Desain website yang ramah pengguna dan menarik secara visual.

## Setup Instructions
1. Clone repositori ke komputer lokal Anda.
   ```bash
   git clone https://github.com/username/songfess-website.git
   ```
2. Masuk ke direktori proyek.
   ```bash
   cd songfess-website
   ```
3. Buat database dan konfigurasikan file `db.php` dengan kredensial database Anda.
4. Siapkan API Spotify:
   - Dapatkan **Client ID** dan **Client Secret** dari [Spotify Developer Dashboard](https://developer.spotify.com/dashboard/).
   - Simpan kredensial API di file konfigurasi atau dalam kode Anda.
5. Jalankan proyek dengan membuka `index.php` di browser Anda.
6. Gunakan formulir untuk mengirim entri songfess baru atau cari entri yang sudah ada.

## Technologies Used
- **PHP** untuk pemrosesan di sisi server
- **MySQL** untuk manajemen database
- **HTML/CSS** untuk tampilan antarmuka
- **JavaScript** untuk fitur dinamis
- **Spotify API** untuk pencarian lagu secara otomatis

## License
Proyek ini dilisensikan di bawah **MIT License** - lihat file `LICENSE` untuk detail lebih lanjut.

---
Dibuat dengan ❤️ oleh<p><a href="https://instagram.com/awfajrii" target="_blank">Auf Fajri Ramadhani</a></p>

