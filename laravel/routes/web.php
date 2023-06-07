<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'index'])->name('site.home');

Route::resource('books', BookController::class);

Route::get('/book/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/profile/update', [UserController::class, 'update'])->name('user.update');


Route::middleware(['web'])->group(function () {
    
    Route::get('/login', [LoginController::class, 'index'])->name('login.login');
    Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

    
    Route::get('/register', [LoginController::class, 'register'])->name('login.register');
    Route::post('/create', [LoginController::class, 'create'])->name('login.create');

    Route::get('/logout' , [LoginController::class, 'logout'])->name('login.logout');
});

Route::get('/add', [BookController::class, 'index'])->name('site.addBook');
Route::post('/add', [BookController::class, 'store'])->name('books.store');
Route::put('/book/{slug}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{slug}', [BookController::class, 'delete'])->name('book.delete');
Route::get('/books/{genre}', [BookController::class, 'show'])->name('books.genre');
Route::get('/allBooks', [BookController::class, 'allBooks'])->name('site.allBooks');


Route::get('/adminpanel', [AdminController::class, 'index'])->name('admin.panel');

Route::put('/admin/users/{id}', [AdminController::class, 'updateRole'])->name('user.updateRole');
