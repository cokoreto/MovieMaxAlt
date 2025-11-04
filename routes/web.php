<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\MovieAdminController;

// ====================
// 🔹 Tampilan utama (User)
// ====================

// Halaman utama menampilkan Movie Page
Route::get('/', [MovieController::class, 'index'])->name('home');

// Tambahan route untuk /home agar tidak 404
Route::get('/home', function () {
    return view('home');
})->name('home.page');

// Route untuk movie streaming (halaman statis dari assets/Movie_stream)
Route::get('/movie/{slug}', function ($slug) {
    $path = public_path("assets/Movie_stream/{$slug}.html");
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
});

// ====================
// 🔹 Admin Dashboard CRUD
// ====================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('movies', \App\Http\Controllers\Admin\MovieController::class);
});
