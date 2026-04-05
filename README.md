# Sistem Arsip Surat (arsipsurat)

Sistem Arsip Surat adalah aplikasi web yang dibangun menggunakan PHP native untuk mengelola dan mengarsipkan surat masuk dan surat keluar secara digital. Aplikasi ini dirancang untuk mempermudah proses pencatatan, pencarian, dan pelacakan surat di lingkungan instansi atau organisasi.

![Tangkapan Layar Aplikasi](img/screenshots/screenshot.png) <!-- Ganti dengan path gambar tangkapan layar aplikasi Anda -->

## ✨ Fitur Utama

- **Manajemen Pengguna:**
  - Dua level pengguna: **Admin** dan **Bagian** (Departemen).
  - Login dan otentikasi pengguna yang aman.
  - Admin dapat mengelola semua data surat dan pengguna.
  - Pengguna Bagian dapat melihat surat yang relevan dengan departemennya.

- **Surat Masuk:**
  - Pencatatan detail surat masuk (nomor surat, tanggal, pengirim, perihal).
  - Upload file pindaian (scan) surat dalam format PDF.
  - Fitur disposisi surat ke bagian atau pejabat terkait.
  - Pencarian dan pemfilteran data surat masuk.

- **Surat Keluar:**
  - Pencatatan detail surat keluar.
  - Upload file digital surat keluar.
  - Penomoran surat otomatis (dapat dikonfigurasi).
  - Pencarian dan pemfilteran data surat keluar.

- **Laporan:**
  - Generate laporan surat masuk dan keluar dalam format Excel (menggunakan PHPExcel).
  - Filter laporan berdasarkan rentang tanggal.

- **Profil:**
  - Pengguna dapat mengelola informasi profil mereka sendiri.

## 🚀 Teknologi yang Digunakan

- **Backend:** PHP 7.x (Native)
- **Frontend:**
  - HTML5
  - CSS3
  - JavaScript
  - [Bootstrap](https://getbootstrap.com/)
  - [jQuery](https://jquery.com/)
  - [DataTables](https://datatables.net/) untuk tabel interaktif.
  - [Chart.js](https://www.chartjs.org/) untuk visualisasi data.
- **Database:** MySQL / MariaDB
- **Library Tambahan:**
  - [PHPExcel](https://github.com/PHPOffice/PHPExcel) untuk ekspor data ke Excel.

## ⚙️ Panduan Instalasi

Untuk menjalankan proyek ini di lingkungan lokal, ikuti langkah-langkah berikut:

1.  **Prasyarat:**
    - Pastikan Anda memiliki web server seperti [XAMPP](https://www.apachefriends.org/index.html) atau WAMP yang sudah terinstal.
    - Web server harus menjalankan PHP versi 7.x atau lebih tinggi.

2.  **Clone Repository:**

    ```bash
    git clone https://github.com/username/arsipsurat.git
    ```

    Atau, unduh dan ekstrak file ZIP proyek.

3.  **Pindahkan Folder Proyek:**
    - Salin folder `arsipsurat` ke dalam direktori `htdocs` di dalam instalasi XAMPP Anda (misalnya: `C:\xampp\htdocs\`).

4.  **Setup Database:**
    - Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
    - Buat database baru dengan nama `db_surat`.
    - Pilih database `db_surat` yang baru dibuat, lalu klik tab **Import**.
    - Pilih file `db_surat.sql` yang ada di dalam folder proyek dan klik **Go** atau **Import**.

5.  **Konfigurasi Koneksi Database:**
    - Buka file `koneksi/koneksi.php`.
    - Sesuaikan detail koneksi database jika diperlukan (secara default sudah diatur untuk lingkungan XAMPP standar).

    ```php
    <?php
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "db_surat";

    $db = mysqli_connect($server, $username, $password, $database);
    // ...
    ?>
    ```

6.  **Akses Aplikasi:**
    - Buka browser Anda dan akses URL: `http://localhost/arsipsurat`.
    - Anda akan diarahkan ke halaman login.

## 🔑 Akun Demo

Anda dapat menggunakan akun berikut untuk login dan mencoba aplikasi:

- **Admin:**
  - **Username:** `admin`
  - **Password:** `admin`

- **User Bagian:**
  - _(Tambahkan informasi login untuk user bagian jika ada)_

## 📂 Struktur Direktori

```
arsipsurat/
├── admin/            # File-file untuk antarmuka admin
├── assets/           # Aset frontend (CSS, JS, library pihak ketiga)
├── bagian/           # File-file untuk antarmuka pengguna bagian
├── koneksi/          # Skrip koneksi database dan manajemen sesi
├── proses/           # Skrip PHP untuk memproses data (CRUD)
├── surat_keluar/     # Direktori penyimpanan file surat keluar
├── surat_masuk/      # Direktori penyimpanan file surat masuk
├── db_surat.sql      # File dump skema dan data database
├── index.php         # Halaman utama atau landing page
└── README.md         # File ini
```

## 🤝 Kontribusi

Kontribusi untuk pengembangan proyek ini sangat diterima. Silakan buat _fork_ dari repositori ini, buat _branch_ baru untuk fitur Anda, dan kirimkan _pull request_.

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE). <!-- Buat file LICENSE jika perlu -->
