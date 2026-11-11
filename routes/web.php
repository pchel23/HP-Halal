<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/authorization', [HomeController::class, 'authorization'])->name('authorization');
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::post('/user_create', [HomeController::class, 'user_create'])->name('user_create');
Route::get('/profile', [Controller::class, 'profile'])->name('profile');
Route::post('/profile/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.categories');
Route::get('/admin/category/form_add', [AdminController::class, 'form_category'])->name('form_category');
Route::post('/admin/category', [AdminController::class, 'add_category'])->name('admin.category.store');
Route::get('/admin/category/{id}/edit', [AdminController::class, 'edit_category'])->name('admin.category.edit');
Route::put('/admin/category/{id}', [AdminController::class, 'update_category'])->name('admin.category.update');
Route::delete('/admin/category/{id}', [AdminController::class, 'delete_category'])->name('admin.category.delete');
Route::get('/admin/point', [AdminController::class, 'point'])->name('admin.points');
Route::get('/admin/point/form_add', [AdminController::class, 'form_point'])->name('form_point');
Route::post('/admin/point', [AdminController::class, 'add_point'])->name('admin.point.store');
Route::get('/admin/point/{id}/edit', [AdminController::class, 'edit_point'])->name('admin.point.edit');
Route::put('/admin/point/{id}', [AdminController::class, 'update_point'])->name('admin.point.update');
Route::delete('/admin/point/{id}', [AdminController::class, 'delete_point'])->name('admin.point.delete');
