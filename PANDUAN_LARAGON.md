# Panduan Konfigurasi Website SMP Pancasila Krian di Laragon

**Penulis**: Manus AI  
**Tanggal**: 6 September 2025  
**Versi**: 1.0  

## Daftar Isi

1. [Persiapan Laragon](#persiapan-laragon)
2. [Setup Project di Laragon](#setup-project-di-laragon)
3. [Konfigurasi Virtual Host](#konfigurasi-virtual-host)
4. [Database Configuration](#database-configuration)
5. [SSL Configuration](#ssl-configuration)
6. [Performance Optimization](#performance-optimization)
7. [Troubleshooting](#troubleshooting)

---

## Persiapan Laragon

### Download dan Instalasi Laragon

1. **Download Laragon Full**
   - Kunjungi https://laragon.org/download/
   - Download versi "Laragon Full" (sekitar 180MB)
   - Versi Full sudah include Apache, MySQL, PHP, Node.js, dan tools lainnya

2. **Instalasi Laragon**
   - Jalankan installer sebagai Administrator
   - Pilih direktori instalasi (default: C:\laragon)
   - Ikuti wizard instalasi hingga selesai

3. **Konfigurasi Awal**
   - Buka Laragon dari Start Menu
   - Klik "Start All" untuk menjalankan Apache dan MySQL
   - Pastikan status menunjukkan "Running"

### Verifikasi Instalasi

Buka browser dan akses:
- http://localhost - Harus menampilkan halaman Laragon
- http://localhost/phpmyadmin - Untuk akses database

---

## Setup Project di Laragon

### 1. Persiapan Direktori

Laragon menggunakan folder `C:\laragon\www` sebagai document root. Semua project harus ditempatkan di sini.

```bash
# Buka Command Prompt sebagai Administrator
cd C:\laragon\www
```

### 2. Clone atau Copy Project

Jika Anda sudah memiliki project yang sudah dibuat:

```bash
# Copy project ke direktori Laragon
xcopy "path\to\smp-pancasila-krian" "C:\laragon\www\smp-pancasila-krian" /E /I

# Atau jika menggunakan Git
git clone [repository-url] smp-pancasila-krian
```

Jika membuat project baru:

```bash
cd C:\laragon\www
composer create-project laravel/laravel smp-pancasila-krian
```

### 3. Konfigurasi Environment

Edit file `.env` di dalam project:

```env
APP_NAME="SMP Pancasila Krian"
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://smp-pancasila-krian.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smp_pancasila_krian
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Install Dependencies

```bash
cd C:\laragon\www\smp-pancasila-krian

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Generate application key (jika belum ada)
php artisan key:generate
```

---

## Konfigurasi Virtual Host

Laragon memiliki fitur auto virtual host yang sangat memudahkan development.

### 1. Auto Virtual Host

Laragon secara otomatis membuat virtual host berdasarkan nama folder di `www`. Untuk project `smp-pancasila-krian`, virtual host akan otomatis tersedia di:

- http://smp-pancasila-krian.test

### 2. Manual Virtual Host (Opsional)

Jika ingin konfigurasi manual, ikuti langkah berikut:

1. **Buka Laragon Menu**
   - Klik kanan icon Laragon di system tray
   - Pilih "Apache" > "sites-enabled"

2. **Buat File Virtual Host**
   - Buat file baru: `smp-pancasila-krian.conf`
   - Isi dengan konfigurasi berikut:

```apache
<VirtualHost *:80>
    DocumentRoot "C:/laragon/www/smp-pancasila-krian/public"
    ServerName smp-pancasila-krian.test
    ServerAlias *.smp-pancasila-krian.test
    
    <Directory "C:/laragon/www/smp-pancasila-krian/public">
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog "C:/laragon/logs/smp-pancasila-krian_error.log"
    CustomLog "C:/laragon/logs/smp-pancasila-krian_access.log" combined
</VirtualHost>
```

3. **Update Hosts File**
   - Buka `C:\Windows\System32\drivers\etc\hosts` sebagai Administrator
   - Tambahkan baris: `127.0.0.1 smp-pancasila-krian.test`

4. **Restart Apache**
   - Klik kanan Laragon > Apache > Reload

### 3. Verifikasi Virtual Host

Buka browser dan akses http://smp-pancasila-krian.test. Jika berhasil, akan muncul halaman Laravel atau website sekolah.

---

## Database Configuration

### 1. Akses phpMyAdmin

- Buka http://localhost/phpmyadmin
- Login dengan:
  - Username: `root`
  - Password: (kosong)

### 2. Buat Database

1. **Klik tab "Databases"**
2. **Masukkan nama database**: `smp_pancasila_krian`
3. **Pilih Collation**: `utf8mb4_unicode_ci`
4. **Klik "Create"**

### 3. Import Data (Jika Ada)

Jika memiliki file SQL backup:

1. **Pilih database** `smp_pancasila_krian`
2. **Klik tab "Import"**
3. **Choose File** dan pilih file .sql
4. **Klik "Go"**

### 4. Jalankan Migration

```bash
cd C:\laragon\www\smp-pancasila-krian
php artisan migrate
```

### 5. Seed Data (Opsional)

Jika ada seeder:

```bash
php artisan db:seed
```

---

## SSL Configuration

Untuk menggunakan HTTPS di development, Laragon menyediakan fitur SSL otomatis.

### 1. Enable SSL

1. **Klik kanan icon Laragon**
2. **Pilih "Apache" > "SSL" > "Enabled"**
3. **Restart Apache**

### 2. Generate SSL Certificate

1. **Klik kanan icon Laragon**
2. **Pilih "Apache" > "SSL" > "Certificate" > "Add"**
3. **Masukkan domain**: `smp-pancasila-krian.test`
4. **Klik "Add"**

### 3. Update Environment

Edit file `.env`:

```env
APP_URL=https://smp-pancasila-krian.test
```

### 4. Verifikasi SSL

Akses https://smp-pancasila-krian.test. Browser mungkin menampilkan warning karena self-signed certificate, klik "Advanced" > "Proceed to site".

---

## Performance Optimization

### 1. PHP Configuration

Edit file `php.ini` melalui Laragon:

1. **Klik kanan Laragon > PHP > php.ini**
2. **Sesuaikan konfigurasi**:

```ini
memory_limit = 256M
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
max_input_vars = 3000

; Enable OPcache
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

### 2. Apache Configuration

Edit `httpd.conf` melalui Laragon:

1. **Klik kanan Laragon > Apache > httpd.conf**
2. **Enable mod_rewrite** (biasanya sudah aktif):

```apache
LoadModule rewrite_module modules/mod_rewrite.so
```

### 3. Laravel Optimization

```bash
cd C:\laragon\www\smp-pancasila-krian

# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### 4. Node.js Build Optimization

```bash
# Development build dengan watch
npm run dev

# Production build
npm run build
```

---

## Troubleshooting

### Masalah Umum dan Solusi

#### 1. Website Tidak Bisa Diakses

**Gejala**: Error 404 atau "This site can't be reached"

**Solusi**:
- Pastikan Apache running di Laragon
- Periksa virtual host configuration
- Restart Apache: Laragon > Apache > Reload
- Clear DNS cache: `ipconfig /flushdns` di Command Prompt

#### 2. Database Connection Error

**Gejala**: "SQLSTATE[HY000] [2002] No connection could be made"

**Solusi**:
- Pastikan MySQL running di Laragon
- Periksa konfigurasi `.env`:
  ```env
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Restart MySQL: Laragon > MySQL > Reload

#### 3. Permission Error

**Gejala**: "The stream or file could not be opened in append mode"

**Solusi**:
```bash
# Berikan permission pada folder storage dan bootstrap/cache
icacls "C:\laragon\www\smp-pancasila-krian\storage" /grant Everyone:F /T
icacls "C:\laragon\www\smp-pancasila-krian\bootstrap\cache" /grant Everyone:F /T
```

#### 4. Composer/NPM Error

**Gejala**: Command not found atau dependency error

**Solusi**:
- Pastikan PATH environment sudah benar
- Restart Command Prompt setelah install Laragon
- Update Composer: `composer self-update`
- Clear NPM cache: `npm cache clean --force`

#### 5. CSS/JS Tidak Load

**Gejala**: Website tampil tanpa styling atau JavaScript tidak berfungsi

**Solusi**:
- Jalankan `npm run dev` untuk development
- Atau `npm run build` untuk production
- Periksa file `vite.config.js`
- Clear browser cache

#### 6. Slow Performance

**Solusi**:
- Disable antivirus real-time scanning untuk folder Laragon
- Tambahkan folder Laragon ke exclusion list Windows Defender
- Gunakan SSD jika memungkinkan
- Increase PHP memory limit

### Tools Debugging

#### 1. Laravel Telescope (Opsional)

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

Akses: http://smp-pancasila-krian.test/telescope

#### 2. Laravel Debugbar (Opsional)

```bash
composer require barryvdh/laravel-debugbar --dev
```

#### 3. Log Monitoring

Monitor log files di:
- `C:\laragon\logs\apache_error.log`
- `C:\laragon\logs\mysql_error.log`
- `storage\logs\laravel.log`

### Backup dan Restore

#### 1. Backup Database

```bash
# Via Command Line
mysqldump -u root -p smp_pancasila_krian > backup.sql

# Via phpMyAdmin
# Export > Go
```

#### 2. Backup Files

```bash
# Copy entire project
xcopy "C:\laragon\www\smp-pancasila-krian" "D:\backup\smp-pancasila-krian" /E /I
```

#### 3. Restore

```bash
# Restore database
mysql -u root -p smp_pancasila_krian < backup.sql

# Restore files
xcopy "D:\backup\smp-pancasila-krian" "C:\laragon\www\smp-pancasila-krian" /E /I
```

---

## Kesimpulan

Dengan mengikuti panduan ini, website SMP Pancasila Krian akan berjalan dengan baik di environment Laragon. Laragon menyediakan environment development yang stabil dan mudah digunakan untuk project Laravel.

**Tips Tambahan**:
- Selalu backup project secara berkala
- Monitor log files untuk debugging
- Update Laragon secara berkala untuk fitur terbaru
- Gunakan version control (Git) untuk tracking changes

Jika mengalami masalah yang tidak tercantum di panduan ini, silakan konsultasikan dengan dokumentasi resmi Laravel atau Laragon.

