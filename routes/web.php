<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//harus diletakan di atas jika tidak akan error karna bertabrakan dengan route dibawah (create)
//route dibawah berfungsi untuk menampilkan semua halaman jika sudah login
Route::resource('blog', App\Http\Controllers\BlogController::class)->except('index','show') ->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//resource untuk membuat route secara otomatis
//only berfungsi agar hanya route yang di tulis yang akan di tampilkan jika tidak login
Route::resource('blog', App\Http\Controllers\BlogController::class)->only(['index','show']);

Route::resource('/course', App\Http\Controllers\CourseController::class)->only(['index']);
Route::get('/course/join/{id}', [App\Http\Controllers\CourseController::class, 'join']);
// Route::get('/course/unjoin/{id}', [App\Http\Controllers\CourseController::class, 'unjoin']);

//nested resource
//nested resource berfungsi untuk membuat route yang berelasi dengan route lain
//shallow hanya sebagai penanda kalau kita menggunakan id untuk sistem komentarnya
Route::resource('blog.comments', App\Http\Controllers\CommentController::class)->shallow()->middleware('auth');