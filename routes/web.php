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
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DasbostController as AdminDasbostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\AttachmentController as AdminAttachmentController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ThemeAssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginFacebookController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\ImageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/theme', [ThemeController::class, 'home'])->name('theme.home');
Route::get('/theme-asset/{path}', ThemeAssetController::class)->where('path', '.*')->name('theme.asset');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/help', 'pages.help')->name('help');
Route::get('/category/{slug}', [PostController::class, 'category'])->name('category.show');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/{postId}/comments', [PostController::class, 'storeComment'])->name('post.comment.store');
Route::get('/download/{attachmentId}', [PostController::class, 'downloadAttachment'])->name('attachment.download');
Route::post('/download-image', [ImageController::class, 'download'])->name('image.download');


// client
Route::get('/detail/{id}', [HomeController::class, 'postCategory'])->name('detail');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tài khoản google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);

// Tài khoản facebook
Route::get('auth/facebook', [LoginFacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [LoginFacebookController::class, 'handleFacebookCallback']);

// Tìm kiếm
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Mua vip
Route::get('/muavip', [HomeController::class, 'vip'])->name('vip');

Route::middleware(['auth','admin'])->group(function () {
   
    Route::prefix('admin')->group(function () {
  
     Route::get('/', [AdminDasbostController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/post', [AdminPostController::class, 'index'])->name('admin.post');
   
    // Thêm mới post
    Route::get('/post/add', [AdminPostController::class, 'create'])->name('create.post');
    Route::post('/post/store', [AdminPostController::class, 'store'])->name('store.post');

    // Sửa post
    Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('admin.edit');
    Route::post('/update/{id}', [AdminPostController::class, 'update'])->name('admin.update');
    
    // Xóa 
    Route::delete('/destroy/{id}', [AdminPostController::class, 'delete'])->name('admin.delete');


    // Tài khoản
    Route::get('/user', [AdminUserController::class, 'index'])->name('admin.user');
    Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::post('/admin/users/{user}/upgrade', [AdminUserController::class, 'upgrade'])->name('users.upgrade');
    Route::post('/admin/users/{user}/upgrade-admin', [AdminUserController::class, 'upgradeAdmin'])->name('users.admin');


    // Danh mục 
      Route::get('/category', [AdminCategoryController::class, 'index'])->name('cate.index');
      Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('cate.create');
      Route::post('/category/store', [AdminCategoryController::class, 'store'])->name('cate.store');
      Route::get('/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('cate.edit');
      Route::post('/category/update/{id}', [AdminCategoryController::class, 'update'])->name('cate.update');
      Route::delete('/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('cate.delete');
    }) ;
}) ;
    
