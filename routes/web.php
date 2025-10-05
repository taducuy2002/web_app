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

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\AttachmentController as AdminAttachmentController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ThemeAssetController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/theme', [ThemeController::class, 'home'])->name('theme.home');
Route::get('/theme-asset/{path}', ThemeAssetController::class)->where('path', '.*')->name('theme.asset');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/help', 'pages.help')->name('help');
Route::get('/category/{slug}', [PostController::class, 'category'])->name('category.show');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/{postId}/comments', [PostController::class, 'storeComment'])->name('post.comment.store');
Route::get('/download/{attachmentId}', [PostController::class, 'downloadAttachment'])->name('attachment.download');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->group(function () {
    // Route::get('/ad', [AdminPostController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.post');
    Route::post('attachments/{post}', [AdminAttachmentController::class, 'store'])->name('attachments.store');
    Route::delete('attachments/{attachment}', [AdminAttachmentController::class, 'destroy'])->name('attachments.destroy');
    }) ;
}) ;
    
