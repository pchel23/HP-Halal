<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\SaveBackUrl;
use Illuminate\Support\Facades\Route;

//пути для обычного пользователя
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/authorization', [HomeController::class, 'authorization'])->name('authorization');
Route::post('/login', [HomeController::class, 'login'])->name('login');
Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::post('/user_create', [HomeController::class, 'user_create'])->name('user_create');
Route::get('/profile', [Controller::class, 'profile'])->name('profile');
Route::post('/profile/logout', [HomeController::class, 'logout'])->name('logout');

//пути для админа, вызов страничек со списком данных CRUD системы
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.categories');
Route::get('/admin/point', [AdminController::class, 'point'])->name('admin.points');
Route::get('/admin/addon', [AdminController::class, 'addons'])->name('admin.addons');
Route::get('/admin/employee', [AdminController::class, 'employee'])->name('admin.employee');

//пути для админа, только страницы с формами, для кнопки назад!!
Route::middleware([SaveBackUrl::class])->group(function () {
    Route::get('/admin/category/form_add', [AdminController::class, 'form_category'])->name('form_category');
    Route::get('/admin/category/{id}/edit', [AdminController::class, 'edit_category'])->name('admin.category.edit');

    Route::get('/admin/point/form_add', [AdminController::class, 'form_point'])->name('form_point');
    Route::get('/admin/point/{id}/edit', [AdminController::class, 'edit_point'])->name('admin.point.edit');

    Route::get('/admin/addon/form_add', [AdminController::class, 'form_addon'])->name('form_addon');
    Route::get('/admin/addon/{id}/edit', [AdminController::class, 'edit_addon'])->name('admin.addon.edit');

    Route::get('/admin/employee/form_add', [AdminController::class, 'form_employee'])->name('form_employee');
    Route::get('/admin/employee/{id}/edit', [AdminController::class, 'edit_employee'])->name('admin.employee.edit');

});

//пути для админа, запрос CRUD системы для категорий
Route::post('/admin/category', [AdminController::class, 'add_category'])->name('admin.category.store');
Route::put('/admin/category/{id}', [AdminController::class, 'update_category'])->name('admin.category.update');
Route::delete('/admin/category/{id}', [AdminController::class, 'delete_category'])->name('admin.category.delete');

//пути для админа, запрос CRUD системы для торговых точек
Route::post('/admin/point', [AdminController::class, 'add_point'])->name('admin.point.store');
Route::put('/admin/point/{id}', [AdminController::class, 'update_point'])->name('admin.point.update');
Route::delete('/admin/point/{id}', [AdminController::class, 'delete_point'])->name('admin.point.delete');

//пути для админа, запрос CRUD системы для дополнений
Route::post('/admin/addon', [AdminController::class, 'add_addon'])->name('admin.addon.store');
Route::put('/admin/addon/{id}', [AdminController::class, 'update_addon'])->name('admin.addon.update');
Route::delete('/admin/addon/{id}', [AdminController::class, 'delete_addon'])->name('admin.addon.delete');

//пути для админа, запрос CRUD системы для сотрудников
Route::post('/admin/employee', [AdminController::class, 'add_employee'])->name('admin.employee.store');
Route::put('/admin/employee/{id}', [AdminController::class, 'update_employee'])->name('admin.employee.update');
Route::delete('/admin/employee/{id}', [AdminController::class, 'delete_employee'])->name('admin.employee.delete');
