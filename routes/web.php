<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicBeritaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\tentangController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AboutController;


// Landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Debug route (opsional, hapus di production)
Route::get('/debug-auth', function () {
    return [
        'user'    => auth()->user(),
        'id'      => auth()->id(),
        'check'   => auth()->check(),
        'session' => session()->all(),
    ];
});

// Login & Dashboard
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Resource Guru
Route::resource('dashboard/teachers', TeacherController::class)->middleware('auth');
Route::resource('dashboard/guru', TeacherController::class)->middleware('auth');

// CRUD Berita Admin
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('berita', NewsController::class)
        ->except(['show'])
        ->parameters([
            'berita' => 'berita'
        ]);
});

// Publik Berita
Route::prefix('berita')->group(function () {
    Route::get('/', [PublicBeritaController::class, 'index'])->name('berita.public.index');
    Route::get('/{slug}', [PublicBeritaController::class, 'show'])->name('berita.public.show');
});

// programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');

// Dashboard CRUD
Route::prefix('dashboard')->group(function () {
    Route::get('/programs', [ProgramController::class, 'dashboardIndex'])->name('dashboard.programs.index');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('dashboard.programs.create');
    Route::post('/programs', [ProgramController::class, 'store'])->name('dashboard.programs.store');
    Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('dashboard.programs.edit');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('dashboard.programs.update');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('dashboard.programs.destroy');
});

// Dashboard Jurnals
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('jurnals', JurnalController::class);
    Route::get('jurnals/{jurnal}/export/word', [JurnalController::class, 'exportWord'])->name('jurnals.export.word');
    Route::get('jurnals/{jurnal}/export/excel', [JurnalController::class, 'exportExcel'])->name('jurnals.export.excel');
    Route::get('jurnals/{jurnal}/export/pdf', [JurnalController::class, 'exportPdf'])->name('jurnals.export.pdf');
});

// Contacts
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Halaman Contact
Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/dashboard/contacts/{id}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
});

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
Route::get('/contacts/{id}/reply', [ContactController::class, 'reply'])->name('contacts.reply');

// Tentang & Fasilitas
Route::get('/tentang', fn () => view('tentang.tentang'))->name('tentang');
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

// Users (otomatis ada: index, create, store, show, edit, update, destroy)
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource('guru', \App\Http\Controllers\TeacherController::class);
});


Route::get('/teachers', [TeacherController::class, 'public'])->name('teachers.public');
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Users Crud
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function() {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});

//Hero crud
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function() {
    Route::resource('hero', HeroController::class)->only(['index', 'edit', 'update']);
});

// //About
// Route::prefix('dashboard/about')->name('dashboard.about.')->group(function() {
//     Route::get('/', [AboutController::class, 'index'])->name('index');
//     Route::get('/{about}/edit', [AboutController::class, 'edit'])->name('edit');
//     Route::put('/{about}', [AboutController::class, 'update'])->name('update');
// });
