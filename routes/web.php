<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

/**
 * HTTP Method:
 * 1. Get : Untuk menampilkan 
 * 2. Post : Untuk mengirim data
 * 3. Put : Untuk mengupdate data
 * 4. Delete : Untuk menghapus data
 */

// Route untuk menampilkan teks salam
Route::get('/salam', function () {
    return "Assalamualaikum...";
});

Route::get('/profile', function () {
    return view('profile');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // route untuk menampilkan halaman student
    Route::get('admin/student', [StudentController::class, 'index'])->middleware('admin');

    Route::get('admin/courses', [CoursesController::class, 'index']);

    // route untuk menampilkan halaman form tambah student
    Route::get('admin/student/create', [StudentController::class, 'create'])->middleware('admin');

    // route untuk mengirim data student baru 
    Route::post('admin/student/store', [StudentController::class, 'store']);

    // route untuk menampilkan halaman form edit student
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

    // route untuk menyimpan hasil update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

    // route untuk menghapus student
    Route::delete('admin/student/delete/{id}', [StudentController::class, 'destory']);

    // COURSES

    // route untuk menampilkan halaman form tambah courses
    Route::get('admin/courses/create', [CoursesController::class, 'create'])->middleware('admin');

    // route untuk mengirim data courses baru 
    Route::post('admin/courses/store', [CoursesController::class, 'store']);

    // route untuk menampilkan halaman form edit courses
    Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit']);

    // route untuk menyimpan hasil update courses
    Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

    // route untuk menghapus courses
    Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destory']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
