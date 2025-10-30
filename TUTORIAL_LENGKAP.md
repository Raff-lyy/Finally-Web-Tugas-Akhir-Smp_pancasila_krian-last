# Tutorial Lengkap: Membuat Website Company Profile SMP Pancasila Krian dengan Laravel dan Tailwind CSS

**Penulis**: Manus AI  
**Tanggal**: 6 September 2025  
**Versi**: 1.0  

## Daftar Isi

1. [Pendahuluan](#pendahuluan)
2. [Persiapan Environment](#persiapan-environment)
3. [Setup Project Laravel](#setup-project-laravel)
4. [Konfigurasi Tailwind CSS](#konfigurasi-tailwind-css)
5. [Pembuatan Komponen Modular](#pembuatan-komponen-modular)
6. [Integrasi dan Styling](#integrasi-dan-styling)
7. [Testing dan Debugging](#testing-dan-debugging)
8. [Konfigurasi untuk Laragon](#konfigurasi-untuk-laragon)
9. [Deployment dan Maintenance](#deployment-dan-maintenance)
10. [Troubleshooting](#troubleshooting)

---

## Pendahuluan

Tutorial ini akan memandu Anda langkah demi langkah dalam membuat website company profile untuk SMP Pancasila Krian menggunakan Laravel sebagai framework backend dan Tailwind CSS untuk styling. Website yang akan dibuat memiliki desain modular dengan warna utama putih dan hijau sebagai accent color, serta dilengkapi dengan berbagai section seperti navbar, hero, about, programs, facilities, blog, contact, dan footer.

### Tujuan Tutorial

Setelah mengikuti tutorial ini, Anda akan mampu:
- Membuat project Laravel dari awal
- Mengintegrasikan Tailwind CSS dengan Laravel
- Membuat komponen modular yang dapat digunakan kembali
- Mengimplementasikan desain responsive
- Mengkonfigurasi website untuk berjalan di Laragon
- Melakukan testing dan debugging

### Prasyarat

Sebelum memulai, pastikan Anda memiliki:
- Pengetahuan dasar HTML, CSS, dan JavaScript
- Pemahaman dasar tentang PHP dan Laravel
- Komputer dengan sistem operasi Windows, macOS, atau Linux
- Koneksi internet yang stabil

---


## Persiapan Environment

Sebelum memulai pengembangan website, kita perlu menyiapkan environment yang diperlukan. Environment yang baik akan memastikan proses development berjalan lancar dan menghindari masalah kompatibilitas.

### Instalasi Software yang Diperlukan

#### 1. Laragon (Untuk Windows)

Laragon adalah environment development yang sangat populer untuk Windows karena kemudahan penggunaannya. Laragon sudah menyediakan Apache, MySQL, PHP, dan Node.js dalam satu paket.

**Langkah instalasi Laragon:**

1. **Download Laragon**
   - Kunjungi website resmi Laragon di https://laragon.org
   - Download versi terbaru (disarankan versi Full yang sudah include semua tools)
   - Pilih versi yang sesuai dengan sistem operasi Anda (32-bit atau 64-bit)

2. **Instalasi Laragon**
   - Jalankan file installer yang telah didownload
   - Ikuti wizard instalasi dengan mengklik "Next" pada setiap langkah
   - Pilih direktori instalasi (default: C:\laragon)
   - Tunggu hingga proses instalasi selesai

3. **Konfigurasi Awal Laragon**
   - Buka Laragon dari Start Menu atau desktop shortcut
   - Klik "Start All" untuk menjalankan Apache dan MySQL
   - Pastikan status Apache dan MySQL menunjukkan "Running"

#### 2. Composer

Composer adalah dependency manager untuk PHP yang sangat penting untuk Laravel.

**Instalasi Composer:**

1. **Download Composer**
   - Kunjungi https://getcomposer.org/download/
   - Download Composer-Setup.exe untuk Windows

2. **Instalasi Composer**
   - Jalankan Composer-Setup.exe
   - Pilih "Install for all users" jika ingin menginstall untuk semua user
   - Pada bagian "Settings Check", pastikan PHP path sudah terdeteksi
   - Jika menggunakan Laragon, PHP path biasanya di C:\laragon\bin\php\php-8.x.x\php.exe
   - Klik "Next" dan tunggu hingga instalasi selesai

3. **Verifikasi Instalasi**
   - Buka Command Prompt atau Terminal
   - Ketik `composer --version`
   - Jika berhasil, akan muncul informasi versi Composer

#### 3. Node.js dan NPM

Node.js diperlukan untuk menjalankan Vite (build tool untuk Laravel) dan mengelola package JavaScript.

**Instalasi Node.js:**

1. **Download Node.js**
   - Kunjungi https://nodejs.org
   - Download versi LTS (Long Term Support) yang paling stabil
   - Pilih installer sesuai sistem operasi Anda

2. **Instalasi Node.js**
   - Jalankan installer Node.js
   - Ikuti wizard instalasi dengan pengaturan default
   - Pastikan opsi "Add to PATH" tercentang

3. **Verifikasi Instalasi**
   - Buka Command Prompt atau Terminal
   - Ketik `node --version` dan `npm --version`
   - Jika berhasil, akan muncul informasi versi masing-masing

### Konfigurasi Environment Variables

Environment variables penting untuk memastikan semua tools dapat diakses dari command line.

**Untuk Windows:**

1. **Buka System Properties**
   - Klik kanan "This PC" atau "My Computer"
   - Pilih "Properties"
   - Klik "Advanced system settings"
   - Klik "Environment Variables"

2. **Tambahkan Path**
   - Pada bagian "System variables", cari dan pilih "Path"
   - Klik "Edit"
   - Tambahkan path berikut (sesuaikan dengan lokasi instalasi):
     - C:\laragon\bin\php\php-8.x.x (untuk PHP)
     - C:\laragon\bin\composer (untuk Composer)
     - C:\Program Files\nodejs (untuk Node.js)

3. **Restart Command Prompt**
   - Tutup dan buka kembali Command Prompt
   - Test dengan mengetik `php --version`, `composer --version`, dan `node --version`

### Persiapan Database

Meskipun website company profile ini tidak menggunakan database yang kompleks, kita tetap perlu menyiapkan database untuk Laravel.

**Konfigurasi MySQL di Laragon:**

1. **Akses phpMyAdmin**
   - Buka Laragon
   - Klik "Database" atau akses http://localhost/phpmyadmin
   - Login dengan username: root, password: (kosong)

2. **Buat Database Baru**
   - Klik tab "Databases"
   - Masukkan nama database: `smp_pancasila_krian`
   - Pilih collation: `utf8mb4_unicode_ci`
   - Klik "Create"

### Persiapan Text Editor

Untuk development yang efisien, disarankan menggunakan text editor yang mendukung syntax highlighting dan extension untuk Laravel.

**Rekomendasi Text Editor:**

1. **Visual Studio Code (Gratis)**
   - Download dari https://code.visualstudio.com
   - Install extension yang berguna:
     - Laravel Extension Pack
     - PHP Intelephense
     - Tailwind CSS IntelliSense
     - Blade Formatter

2. **PHPStorm (Berbayar)**
   - IDE profesional dengan fitur lengkap untuk PHP dan Laravel
   - Tersedia trial 30 hari
   - Sangat direkomendasikan untuk project besar

### Verifikasi Environment

Setelah semua software terinstall, lakukan verifikasi dengan menjalankan command berikut di Command Prompt atau Terminal:

```bash
php --version
composer --version
node --version
npm --version
```

Jika semua command menampilkan versi yang sesuai, maka environment Anda sudah siap untuk development Laravel.

---


## Setup Project Laravel

Setelah environment siap, langkah selanjutnya adalah membuat project Laravel baru. Laravel adalah framework PHP yang powerful dan elegant, sangat cocok untuk membuat website company profile yang professional.

### Membuat Project Laravel Baru

#### 1. Navigasi ke Direktori Kerja

Pertama, kita perlu menentukan lokasi dimana project akan dibuat. Jika menggunakan Laragon, disarankan untuk membuat project di dalam folder `www` agar mudah diakses.

```bash
# Untuk Laragon (Windows)
cd C:\laragon\www

# Untuk XAMPP (Windows)
cd C:\xampp\htdocs

# Untuk macOS/Linux
cd ~/Sites
```

#### 2. Membuat Project dengan Composer

Laravel menyediakan beberapa cara untuk membuat project baru. Cara yang paling umum dan direkomendasikan adalah menggunakan Composer.

```bash
composer create-project laravel/laravel smp-pancasila-krian
```

Command ini akan:
- Download Laravel framework terbaru
- Membuat folder `smp-pancasila-krian`
- Install semua dependencies yang diperlukan
- Generate application key secara otomatis

**Proses ini membutuhkan waktu beberapa menit tergantung kecepatan internet Anda.**

#### 3. Navigasi ke Project Directory

Setelah project berhasil dibuat, masuk ke direktori project:

```bash
cd smp-pancasila-krian
```

#### 4. Verifikasi Instalasi

Untuk memastikan Laravel terinstall dengan benar, jalankan command berikut:

```bash
php artisan --version
```

Jika berhasil, akan muncul informasi versi Laravel yang terinstall.

### Konfigurasi Environment Laravel

#### 1. File .env

Laravel menggunakan file `.env` untuk menyimpan konfigurasi environment. File ini sudah otomatis dibuat saat instalasi, namun kita perlu melakukan beberapa penyesuaian.

Buka file `.env` dengan text editor dan lakukan konfigurasi berikut:

```env
APP_NAME="SMP Pancasila Krian"
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://smp-pancasila-krian.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smp_pancasila_krian
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

**Penjelasan konfigurasi penting:**
- `APP_NAME`: Nama aplikasi yang akan muncul di title browser
- `APP_URL`: URL lokal untuk development (akan disesuaikan dengan Laragon)
- `DB_DATABASE`: Nama database yang sudah dibuat sebelumnya
- `DB_USERNAME` dan `DB_PASSWORD`: Kredensial database MySQL

#### 2. Generate Application Key

Jika application key belum ter-generate otomatis, jalankan command:

```bash
php artisan key:generate
```

Application key ini penting untuk enkripsi data dalam aplikasi Laravel.

### Test Instalasi Laravel

#### 1. Menjalankan Development Server

Laravel menyediakan built-in development server untuk testing lokal:

```bash
php artisan serve
```

Command ini akan menjalankan server di `http://localhost:8000`. Buka URL tersebut di browser untuk melihat halaman welcome Laravel.

#### 2. Konfigurasi Virtual Host di Laragon

Untuk kemudahan development, kita bisa mengkonfigurasi virtual host di Laragon agar website bisa diakses dengan URL yang lebih friendly.

**Langkah-langkah:**

1. **Buka Laragon**
   - Pastikan Laragon sudah running
   - Klik kanan pada icon Laragon di system tray
   - Pilih "Apache" > "sites-enabled"

2. **Buat Virtual Host**
   - Laragon akan otomatis membuat virtual host jika folder project ada di `C:\laragon\www`
   - Restart Apache dengan klik "Apache" > "Reload"

3. **Akses Website**
   - Buka browser dan akses `http://smp-pancasila-krian.test`
   - Jika muncul halaman welcome Laravel, instalasi berhasil

### Struktur Project Laravel

Setelah instalasi berhasil, mari kita pahami struktur folder Laravel:

```
smp-pancasila-krian/
├── app/                    # Core aplikasi (Models, Controllers, dll)
├── bootstrap/              # File bootstrap aplikasi
├── config/                 # File konfigurasi
├── database/              # Migrations, seeders, factories
├── public/                # File public (CSS, JS, images)
├── resources/             # Views, CSS, JS source files
│   ├── css/              # File CSS source
│   ├── js/               # File JavaScript source
│   └── views/            # Blade templates
├── routes/                # File routing
├── storage/               # File storage (logs, cache, dll)
├── tests/                 # Unit tests
├── vendor/                # Dependencies Composer
├── .env                   # Environment configuration
├── artisan               # Laravel CLI tool
├── composer.json         # Composer dependencies
└── package.json          # NPM dependencies
```

**Folder yang akan sering kita gunakan:**
- `resources/views/`: Tempat file Blade templates
- `resources/css/`: File CSS source (untuk Tailwind)
- `resources/js/`: File JavaScript source
- `public/`: File yang bisa diakses langsung dari browser
- `routes/web.php`: Definisi routing website

### Konfigurasi Tambahan

#### 1. Timezone

Sesuaikan timezone aplikasi dengan lokasi Indonesia. Edit file `config/app.php`:

```php
'timezone' => 'Asia/Jakarta',
```

#### 2. Locale

Sesuaikan locale untuk bahasa Indonesia:

```php
'locale' => 'id',
'fallback_locale' => 'en',
```

#### 3. Database Migration

Jalankan migration default Laravel:

```bash
php artisan migrate
```

Command ini akan membuat tabel-tabel default Laravel di database.

### Troubleshooting Setup Laravel

#### Masalah Umum dan Solusi

1. **Error "could not find driver"**
   - Pastikan extension PHP MySQL sudah aktif
   - Edit file `php.ini` dan uncomment `extension=pdo_mysql`

2. **Permission Error (Linux/macOS)**
   ```bash
   sudo chmod -R 775 storage bootstrap/cache
   sudo chown -R $USER:www-data storage bootstrap/cache
   ```

3. **Composer Memory Limit**
   ```bash
   php -d memory_limit=-1 /usr/local/bin/composer create-project laravel/laravel smp-pancasila-krian
   ```

4. **Port 8000 Already in Use**
   ```bash
   php artisan serve --port=8080
   ```

Dengan menyelesaikan langkah-langkah di atas, project Laravel untuk website SMP Pancasila Krian sudah siap untuk tahap pengembangan selanjutnya.

---


## Konfigurasi Tailwind CSS

Tailwind CSS adalah utility-first CSS framework yang memungkinkan kita membuat desain custom dengan cepat. Untuk website SMP Pancasila Krian, kita akan menggunakan Tailwind CSS dengan warna utama putih dan hijau sebagai accent color.

### Instalasi Tailwind CSS

#### 1. Install Dependencies

Pertama, kita perlu menginstall Tailwind CSS dan dependencies yang diperlukan melalui NPM:

```bash
npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
```

**Penjelasan packages:**
- `tailwindcss`: Framework CSS utama
- `postcss`: Tool untuk transformasi CSS
- `autoprefixer`: Plugin untuk menambahkan vendor prefixes secara otomatis

#### 2. Generate Configuration Files

Setelah instalasi selesai, generate file konfigurasi Tailwind CSS:

```bash
npx tailwindcss init -p
```

Command ini akan membuat dua file:
- `tailwind.config.js`: Konfigurasi Tailwind CSS
- `postcss.config.js`: Konfigurasi PostCSS

#### 3. Konfigurasi Tailwind CSS

Edit file `tailwind.config.js` untuk mengkonfigurasi path content dan custom colors:

```javascript
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#f0fdf4',
          100: '#dcfce7',
          200: '#bbf7d0',
          300: '#86efac',
          400: '#4ade80',
          500: '#22c55e',
          600: '#16a34a',
          700: '#15803d',
          800: '#166534',
          900: '#14532d',
          950: '#052e16',
        },
        secondary: {
          50: '#f8fafc',
          100: '#f1f5f9',
          200: '#e2e8f0',
          300: '#cbd5e1',
          400: '#94a3b8',
          500: '#64748b',
          600: '#475569',
          700: '#334155',
          800: '#1e293b',
          900: '#0f172a',
          950: '#020617',
        }
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
      },
      animation: {
        'fade-in': 'fadeIn 0.6s ease-out',
        'slide-up': 'slideUp 0.6s ease-out',
        'bounce-slow': 'bounce 2s infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        }
      }
    },
  },
  plugins: [],
}
```

**Penjelasan konfigurasi:**
- `content`: Path ke file yang menggunakan Tailwind classes
- `colors.primary`: Palet warna hijau untuk branding sekolah
- `colors.secondary`: Palet warna abu-abu untuk elemen pendukung
- `fontFamily`: Font Inter untuk typography yang modern
- `animation` & `keyframes`: Custom animations untuk interaksi

### Setup CSS Files

#### 1. Konfigurasi File CSS Utama

Edit file `resources/css/app.css` dan tambahkan Tailwind directives:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom CSS untuk SMP Pancasila Krian */
@layer base {
  html {
    scroll-behavior: smooth;
  }
  
  body {
    font-family: 'Inter', sans-serif;
  }
}

@layer components {
  /* Button Styles */
  .btn-primary {
    @apply bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl;
  }
  
  .btn-secondary {
    @apply bg-white hover:bg-gray-50 text-primary-600 font-semibold py-3 px-6 rounded-lg border-2 border-primary-600 transition-all duration-200;
  }
  
  .btn-outline {
    @apply bg-transparent hover:bg-primary-600 text-primary-600 hover:text-white font-semibold py-2 px-4 rounded-lg border border-primary-600 transition-all duration-200;
  }
  
  /* Card Styles */
  .card {
    @apply bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6;
  }
  
  .card-hover {
    @apply transform hover:-translate-y-2 transition-all duration-300;
  }
  
  /* Section Styles */
  .section-padding {
    @apply py-16 lg:py-24;
  }
  
  .container-custom {
    @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;
  }
  
  /* Typography */
  .heading-1 {
    @apply text-4xl lg:text-6xl font-bold text-gray-900 leading-tight;
  }
  
  .heading-2 {
    @apply text-3xl lg:text-4xl font-bold text-gray-900 mb-4;
  }
  
  .heading-3 {
    @apply text-2xl lg:text-3xl font-bold text-gray-900 mb-3;
  }
  
  .text-lead {
    @apply text-xl text-gray-600 leading-relaxed;
  }
  
  /* Navigation */
  .nav-link {
    @apply text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200;
  }
  
  .nav-link-active {
    @apply text-primary-600 font-semibold;
  }
  
  /* Form Styles */
  .form-input {
    @apply w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200;
  }
  
  .form-textarea {
    @apply w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-200 resize-none;
  }
  
  .form-label {
    @apply block text-sm font-semibold text-gray-700 mb-2;
  }
  
  /* Animations */
  .animate-on-scroll {
    @apply opacity-0 translate-y-8 transition-all duration-700 ease-out;
  }
  
  .animate-on-scroll.animated {
    @apply opacity-100 translate-y-0;
  }
}

@layer utilities {
  /* Custom utilities */
  .text-shadow {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .bg-gradient-primary {
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
  }
  
  .bg-gradient-hero {
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
  }
  
  /* Scrollbar Styles */
  .scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #16a34a #f1f5f9;
  }
  
  .scrollbar-thin::-webkit-scrollbar {
    width: 8px;
  }
  
  .scrollbar-thin::-webkit-scrollbar-track {
    background: #f1f5f9;
  }
  
  .scrollbar-thin::-webkit-scrollbar-thumb {
    background: #16a34a;
    border-radius: 4px;
  }
  
  .scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #15803d;
  }
}

/* Loading Animation */
.loading-screen {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  transition: opacity 0.5s ease-out;
}

.loading-screen.fade-out {
  opacity: 0;
  pointer-events: none;
}

.loader {
  width: 60px;
  height: 60px;
  border: 4px solid #dcfce7;
  border-top: 4px solid #16a34a;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Responsive Design Helpers */
@media (max-width: 768px) {
  .mobile-menu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-out;
  }
  
  .mobile-menu.open {
    max-height: 500px;
  }
}

/* Print Styles */
@media print {
  .no-print {
    display: none !important;
  }
  
  body {
    font-size: 12pt;
    line-height: 1.4;
  }
  
  .page-break {
    page-break-before: always;
  }
}

/* Accessibility */
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border: 0;
}

.focus\:not-sr-only:focus {
  position: static;
  width: auto;
  height: auto;
  padding: inherit;
  margin: inherit;
  overflow: visible;
  clip: auto;
  white-space: normal;
}

/* Keyboard Navigation */
body.keyboard-navigation *:focus {
  outline: 2px solid #16a34a;
  outline-offset: 2px;
}

/* High Contrast Mode Support */
@media (prefers-contrast: high) {
  .card {
    border: 2px solid #000;
  }
  
  .btn-primary {
    border: 2px solid #000;
  }
}

/* Reduced Motion Support */
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
  
  html {
    scroll-behavior: auto;
  }
}
```

#### 2. Konfigurasi Vite

Pastikan file `vite.config.js` sudah dikonfigurasi dengan benar untuk memproses CSS:

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

### Build dan Test Tailwind CSS

#### 1. Build Assets

Untuk development, jalankan Vite dalam mode watch:

```bash
npm run dev
```

Untuk production build:

```bash
npm run build
```

#### 2. Test Instalasi

Buat file test sederhana untuk memastikan Tailwind CSS berfungsi. Edit file `resources/views/welcome.blade.php`:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Tailwind CSS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="heading-1 text-center mb-8">SMP Pancasila Krian</h1>
        <div class="card max-w-md mx-auto text-center">
            <h2 class="heading-3 text-primary-600">Tailwind CSS Berhasil!</h2>
            <p class="text-gray-600 mb-4">Jika Anda melihat styling ini, berarti Tailwind CSS sudah terkonfigurasi dengan benar.</p>
            <button class="btn-primary">Test Button</button>
        </div>
    </div>
</body>
</html>
```

Akses website di browser untuk melihat apakah styling Tailwind CSS sudah berfungsi.

### Optimasi Tailwind CSS

#### 1. Purge Unused CSS

Tailwind CSS secara otomatis akan menghapus CSS yang tidak digunakan saat build production. Pastikan path content di `tailwind.config.js` sudah benar.

#### 2. Custom Utilities

Tambahkan utility classes custom sesuai kebutuhan project:

```javascript
// tailwind.config.js
module.exports = {
  // ... konfigurasi lainnya
  plugins: [
    function({ addUtilities }) {
      const newUtilities = {
        '.text-shadow-sm': {
          textShadow: '0 1px 2px rgba(0, 0, 0, 0.05)',
        },
        '.text-shadow': {
          textShadow: '0 2px 4px rgba(0, 0, 0, 0.10)',
        },
        '.text-shadow-lg': {
          textShadow: '0 8px 16px rgba(0, 0, 0, 0.15)',
        },
      }
      addUtilities(newUtilities)
    }
  ]
}
```

#### 3. Performance Optimization

Untuk website yang optimal, pertimbangkan penggunaan:

```javascript
// tailwind.config.js
module.exports = {
  // ... konfigurasi lainnya
  corePlugins: {
    // Disable plugins yang tidak digunakan
    float: false,
    objectFit: false,
    objectPosition: false,
  }
}
```

### Troubleshooting Tailwind CSS

#### Masalah Umum dan Solusi

1. **CSS tidak ter-load**
   - Pastikan `@vite` directive ada di blade template
   - Jalankan `npm run dev` untuk development
   - Clear browser cache

2. **Classes tidak berfungsi**
   - Periksa path content di `tailwind.config.js`
   - Pastikan file menggunakan extension yang benar (.blade.php)
   - Restart Vite development server

3. **Build error**
   ```bash
   # Clear cache dan reinstall
   rm -rf node_modules package-lock.json
   npm install
   npm run dev
   ```

4. **Custom colors tidak muncul**
   - Periksa syntax di `tailwind.config.js`
   - Restart development server setelah mengubah config

Dengan konfigurasi Tailwind CSS yang lengkap ini, kita sudah siap untuk membuat komponen-komponen website yang menarik dan responsive.

---


## Pembuatan Komponen Modular

Salah satu keunggulan Laravel adalah kemampuannya untuk membuat komponen yang modular dan dapat digunakan kembali. Untuk website SMP Pancasila Krian, kita akan membuat setiap section sebagai komponen terpisah agar mudah di-maintain dan dikembangkan.

### Struktur Komponen

Kita akan membuat komponen-komponen berikut:
1. **Navbar** - Navigasi utama website
2. **Hero** - Section pembuka dengan informasi utama
3. **About** - Informasi tentang sekolah, visi, dan misi
4. **Programs** - Program-program unggulan sekolah
5. **Facilities** - Fasilitas yang tersedia di sekolah
6. **Blog** - Berita dan kegiatan sekolah
7. **Contact** - Informasi kontak dan form
8. **Footer** - Informasi footer website

### Persiapan Direktori Komponen

Pertama, buat direktori untuk menyimpan komponen:

```bash
mkdir -p resources/views/components
```

### 1. Komponen Navbar

Navbar adalah elemen navigasi yang akan muncul di setiap halaman. Buat file `resources/views/components/navbar.blade.php`:

```html
<!-- Navbar Component -->
<nav class="bg-white shadow-lg fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
    <div class="container-custom">
        <div class="flex justify-between items-center py-4">
            <!-- Logo dan Nama Sekolah -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">SMP Pancasila Krian</h1>
                    <p class="text-sm text-gray-600">Berkarakter & Berprestasi</p>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="#home" class="nav-link">Beranda</a>
                <a href="#about" class="nav-link">Tentang</a>
                <a href="#programs" class="nav-link">Program</a>
                <a href="#facilities" class="nav-link">Fasilitas</a>
                <a href="#blog" class="nav-link">Berita</a>
                <a href="#contact" class="nav-link">Kontak</a>
                <button class="btn-primary">Daftar Sekarang</button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="lg:hidden hidden mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
                <a href="#home" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Beranda</a>
                <a href="#about" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Tentang</a>
                <a href="#programs" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Program</a>
                <a href="#facilities" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Fasilitas</a>
                <a href="#blog" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Berita</a>
                <a href="#contact" class="mobile-nav-link block px-3 py-2 text-gray-700 hover:text-primary-600">Kontak</a>
                <div class="px-3 py-2">
                    <button class="btn-primary w-full">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</nav>
```

### 2. Komponen Hero

Hero section adalah bagian pertama yang dilihat pengunjung. Buat file `resources/views/components/hero.blade.php`:

```html
<!-- Hero Section -->
<section id="home" class="bg-gradient-hero text-white section-padding pt-32">
    <div class="container-custom">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="text-center lg:text-left">
                <h1 class="heading-1 text-white mb-6 animate-fade-in">
                    SMP Pancasila Krian
                </h1>
                <p class="text-xl text-green-100 mb-8 leading-relaxed animate-fade-in" style="animation-delay: 0.2s;">
                    Membentuk generasi yang berkarakter, berprestasi, dan berakhlak mulia dengan pendidikan berkualitas tinggi
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in" style="animation-delay: 0.4s;">
                    <button class="btn-secondary">Pelajari Lebih Lanjut</button>
                    <button class="btn-outline border-white text-white hover:bg-white hover:text-primary-600">Daftar Sekarang</button>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 gap-6 animate-fade-in" style="animation-delay: 0.6s;">
                <div class="text-center bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="text-4xl font-bold mb-2" data-count="500">0</div>
                    <div class="text-green-100">Siswa Aktif</div>
                </div>
                <div class="text-center bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="text-4xl font-bold mb-2" data-count="45">0</div>
                    <div class="text-green-100">Guru Berpengalaman</div>
                </div>
                <div class="text-center bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="text-4xl font-bold mb-2" data-count="15">0</div>
                    <div class="text-green-100">Program Unggulan</div>
                </div>
                <div class="text-center bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="text-4xl font-bold mb-2" data-count="25">0</div>
                    <div class="text-green-100">Tahun Berpengalaman</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/5 rounded-full"></div>
    </div>
</section>
```

### 3. Komponen About

Section tentang sekolah dengan visi, misi, dan nilai-nilai. Buat file `resources/views/components/about.blade.php`:

```html
<!-- About Section -->
<section id="about" class="section-padding bg-gray-50">
    <div class="container-custom">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="heading-2">Tentang SMP Pancasila Krian</h2>
            <p class="text-lead max-w-3xl mx-auto">
                Sekolah yang berkomitmen untuk memberikan pendidikan terbaik dengan mengembangkan potensi siswa secara optimal
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-center mb-16">
            <!-- Content -->
            <div>
                <h3 class="heading-3 text-primary-600 mb-6">Visi Kami</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Menjadi sekolah menengah pertama yang unggul dalam prestasi akademik dan non-akademik, 
                    berkarakter Pancasila, dan mampu bersaing di era global dengan tetap menjunjung tinggi 
                    nilai-nilai budaya bangsa.
                </p>

                <h3 class="heading-3 text-primary-600 mb-6">Misi Kami</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Menyelenggarakan pendidikan yang berkualitas dan berkarakter
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Mengembangkan potensi siswa secara optimal dan menyeluruh
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Menanamkan nilai-nilai Pancasila dalam kehidupan sehari-hari
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Mempersiapkan siswa untuk melanjutkan ke jenjang pendidikan yang lebih tinggi
                    </li>
                </ul>
            </div>

            <!-- Image Placeholder -->
            <div class="relative">
                <div class="bg-gradient-primary rounded-2xl p-8 text-center">
                    <div class="w-32 h-32 bg-primary-600 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3z"/>
                            <path d="M3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Gedung Sekolah</h4>
                    <p class="text-gray-600">Fasilitas modern dan nyaman untuk belajar</p>
                </div>
            </div>
        </div>

        <!-- Values -->
        <div class="grid md:grid-cols-2 gap-8">
            <div class="card card-hover text-center">
                <div class="w-16 h-16 bg-primary-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">Integritas</h4>
                <p class="text-gray-600">Jujur dan bertanggung jawab</p>
            </div>

            <div class="card card-hover text-center">
                <div class="w-16 h-16 bg-primary-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        <path d="M6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 mb-2">Kolaborasi</h4>
                <p class="text-gray-600">Bekerja sama mencapai tujuan</p>
            </div>
        </div>

        <!-- Achievement Stats -->
        <div class="mt-16 bg-white rounded-2xl shadow-lg p-8">
            <h3 class="heading-3 text-center mb-8">Prestasi Kami</h3>
            <p class="text-center text-gray-600 mb-8">Pencapaian yang membanggakan dalam berbagai bidang</p>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600 mb-2" data-count="95">0</div>
                    <div class="text-sm text-gray-600">Tingkat Kelulusan</div>
                    <div class="text-xs text-gray-500">%</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600 mb-2" data-count="50">0</div>
                    <div class="text-sm text-gray-600">Prestasi Akademik</div>
                    <div class="text-xs text-gray-500">+</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600 mb-2" data-count="30">0</div>
                    <div class="text-sm text-gray-600">Prestasi Non-Akademik</div>
                    <div class="text-xs text-gray-500">+</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-primary-600 mb-2">A</div>
                    <div class="text-sm text-gray-600">Akreditasi Sekolah</div>
                    <div class="text-xs text-gray-500">Unggul</div>
                </div>
            </div>
        </div>
    </div>
</section>
```

### 4. Komponen Programs

Section untuk menampilkan program-program unggulan sekolah. Buat file `resources/views/components/programs.blade.php`:

```html
<!-- Programs Section -->
<section id="programs" class="section-padding">
    <div class="container-custom">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="heading-2">Program Unggulan</h2>
            <p class="text-lead max-w-3xl mx-auto">
                Berbagai program unggulan yang dirancang untuk mengembangkan potensi siswa secara optimal
            </p>
        </div>

        <!-- Programs Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Program 1: Kelas Unggulan -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3z"/>
                        <path d="M3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kelas Unggulan</h3>
                <p class="text-gray-600 mb-4">
                    Program kelas unggulan dengan kurikulum yang diperkaya dan metode pembelajaran inovatif untuk siswa berprestasi.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Rasio guru-siswa 1:20
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Pembelajaran berbasis teknologi
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Bimbingan intensif olimpiade
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>

            <!-- Program 2: STEM -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Program STEM</h3>
                <p class="text-gray-600 mb-4">
                    Program Science, Technology, Engineering, and Mathematics untuk mengembangkan kemampuan berpikir kritis dan inovatif.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Laboratorium sains modern
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Project-based learning
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Kompetisi sains nasional
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>

            <!-- Program 3: Character Building -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Karakter Building</h3>
                <p class="text-gray-600 mb-4">
                    Program pembentukan karakter berbasis nilai-nilai Pancasila untuk mengembangkan kepribadian yang berakhlak mulia.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Pendidikan moral dan etika
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Kegiatan sosial kemasyarakatan
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Leadership training
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>

            <!-- Program 4: Ekstrakurikuler -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Ekstrakurikuler</h3>
                <p class="text-gray-600 mb-4">
                    Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat, minat, dan kreativitas siswa di berbagai bidang.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Pramuka dan PMR
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Olahraga dan seni
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Klub bahasa dan debat
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>

            <!-- Program 5: Bimbingan Konseling -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Bimbingan Konseling</h3>
                <p class="text-gray-600 mb-4">
                    Layanan bimbingan dan konseling komprehensif untuk mendukung perkembangan akademik dan personal siswa.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Konseling individual
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Bimbingan karir
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Konsultasi orang tua
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>

            <!-- Program 6: Literasi -->
            <div class="card card-hover">
                <div class="w-16 h-16 bg-primary-100 rounded-xl mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Program Literasi</h3>
                <p class="text-gray-600 mb-4">
                    Program literasi digital dan numerasi untuk meningkatkan kemampuan membaca, menulis, dan berhitung siswa.
                </p>
                <ul class="space-y-2 text-sm text-gray-600 mb-6">
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Perpustakaan digital
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Klub jurnalistik
                    </li>
                    <li class="flex items-center">
                        <svg class="w-4 h-4 text-primary-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Kompetisi literasi
                    </li>
                </ul>
                <a href="#" class="btn-outline">Pelajari Lebih Lanjut →</a>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-gradient-primary rounded-2xl p-8 lg:p-12 text-center">
            <h3 class="heading-3 mb-4">Tertarik dengan Program Kami?</h3>
            <p class="text-lead mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan SMP Pancasila Krian dan rasakan pengalaman belajar yang tak terlupakan dengan program-program unggulan kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="btn-primary">Daftar Sekarang</button>
                <button class="btn-secondary">Konsultasi Gratis</button>
            </div>
        </div>
    </div>
</section>
```

Dengan struktur komponen modular seperti ini, setiap section dapat dikembangkan dan di-maintain secara terpisah, memudahkan proses development dan debugging. Setiap komponen juga menggunakan class-class Tailwind CSS yang sudah kita konfigurasi sebelumnya untuk konsistensi desain.

---

