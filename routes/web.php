<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $nama = "Kashka Octora Pratama";
    $umur = 19;
    return view('about', ['nama' => $nama, 'umur' => $umur]);
    // return view('about', compact('nama', 'umur'));
    // return view('about')->with('nama', 'Kashka')->with('umur', 17);
})->name('about');




Route::middleware('auth')->controller(BukuController::class)->group(function(){

    Route::get('/buku', 'index')->name('buku.index');

    Route::post('/buku', 'store')->name('buku.store');

    Route::get('/buku/create', 'create')->name('buku.create');

    Route::delete('/buku/{buku}', 'destroy')->name('buku.destroy');

    Route::get('/buku/edit/{buku}', 'edit')->name('buku.edit');

    Route::patch('/buku/{buku}', 'update')->name('buku.update');

});


// Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.login');

// Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');

// Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

// Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function(){

    Route::get('/auth/login', 'showLogin')->name('auth.login');

    Route::get('/auth/register', 'showRegister')->name('auth.register');

    Route::post('/auth/login', 'login')->name('login');

    Route::post('/auth/register', 'register')->name('register');

});

Route::middleware('auth')->controller(SiswaController::class)->group(function(){

    Route::get('/siswa', 'index')->name('siswa.index');
    
    Route::post('/siswa',  'store')->name('siswa.store');
    
    Route::get('/siswa/create', 'create')->name('siswa.create');
    
    Route::get('/siswa/{siswa}',  'show')->name('siswa.show');
    
    Route::delete('/siswa/{siswa}',  'destroy')->name('siswa.destroy');

    Route::patch('/siswa/{siswa}', 'update')->name('siswa.update');

    Route::get('/siswa/edit/{siswa}', 'edit')->name('siswa.edit');

});

Route::middleware('auth')->controller(ProfileController::class)->group( function(){

    Route::get('/profile',  'index')->name('profile.index');

    Route::patch('/profile/update',  [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


    Route::get('/contact', function () {return view('contact');})->name('contact');

    Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

});


// Route::middleware('auth')->group(function(){

//     Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    
//     Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    
//     Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    
//     Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    
//     Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// });

    // Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    
    // Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    
    // Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    
    // Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    
    // Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

