<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UsersController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Misc
Route::post('/select/subcategory', [ApplicationController::class, 'select_subcategory']);
Route::get('/search', SearchController::class)->name('search');

// Guest routes
Route::get('/', [GuestController::class, 'index'])->name('app.index');
Route::get('/page/{slug}', [GuestController::class, 'staticPage'])->name('page.show');
Route::get('/p/{slug}', [GuestController::class, 'singlePost'])->name('post.show')->middleware('analytics');
Route::get('/c/{slug}', [GuestController::class, 'categories'])->name('post.category');
Route::get('/c/s/{slug}', [GuestController::class, 'subcategories'])->name('post.subcategory');
Route::post('/subscribe', [GuestController::class, 'subscribeUser'])->name('user.subscribe');
Route::get('/unsubscribe', [GuestController::class, 'unsubscribeUser'])->name('user.unsubscribe');

Auth::routes();
// Authenticated user
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});

// Admin panel
// TODO: Implement resource routes
Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('/settings/regional', [SettingsController::class, 'regional'])->name('settings.regional');
    Route::get('/settings/analytics', [SettingsController::class, 'analytics'])->name('settings.analytics');
    Route::get('/settings/mail', [SettingsController::class, 'mail'])->name('settings.mail');
    Route::post('/settings/store', [SettingsController::class, 'store'])->name('settings.store');
    // Newsletters
    Route::get('/newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
    Route::get('/newsletters/delete/{id}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy');
    // Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // Subcategory
    Route::get('/subcategories/{id}', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::post('/subcategories/store/{id}', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategories/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::post('/subcategories/update/{id}', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::get('/subcategories/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
    // Post
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/post_type', [PostController::class, 'postType'])->name('post_type');
    Route::get('/post_format', [PostController::class, 'postFormat'])->name('post_format');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/add', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
    Route::get('/pages/delete/{id}', [PageController::class, 'delete'])->name('pages.destroy');
    // Mail and Messaging
    Route::get('/mail', [MailController::class, 'index'])->name('mail.index');
    // Analytics
    Route::get('/analytics', [AnalyticController::class, 'index'])->name('analytics.index');
    // Blank page for development use only.
    Route::get('/blank', [AdminController::class, 'blank'])->name('admin.blank');
});
