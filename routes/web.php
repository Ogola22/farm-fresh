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


//Home controllers

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('home.services');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('home.products');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('home.blog');
Route::get('/feature', [App\Http\Controllers\HomeController::class, 'feature'])->name('home.feature');
Route::get('/detail', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');
Route::get('/team', [App\Http\Controllers\HomeController::class, 'team'])->name('home.team');
Route::get('/testimonial', [App\Http\Controllers\HomeController::class, 'testimonial'])->name('home.testimonial');


//Admin controllers

Route::get('/admin/index', [App\Http\Controllers\adminController::class, 'index'])->name('admin.index');

//category controllers

Route::post('/category', [App\Http\Controllers\categoryController::class, 'chooseCategory'])->name('category');

//$crop->user()->name();
//crop routes
Route::get('/category/crop/create', [App\Http\Controllers\cropController::class, 'create'])->name('crop.create');
Route::get('/category/crop/index', [App\Http\Controllers\cropController::class, 'index'])->name('crop.index');
Route::post('/category/crop/create', [App\Http\Controllers\cropController::class, 'store'])->name('crop.store');
Route::get('/category/crop/{id}/edit', [App\Http\Controllers\cropController::class, 'edit'])->name('crop.edit');
Route::put('/category/crop/{id}', [App\Http\Controllers\cropController::class, 'update'])->name('crop.update');
Route::delete('/category/crop/{id}/delete', [App\Http\Controllers\cropController::class, 'destroy'])->name('crop.destroy');

//animal routes
Route::get('/category/animal/create', [App\Http\Controllers\animalController::class, 'create'])->name('animal.create');
Route::get('/category/animal/index', [App\Http\Controllers\animalController::class, 'index'])->name('animal.index');
Route::post('/category/animal/create', [App\Http\Controllers\animalController::class, 'store'])->name('animal.store');
Route::get('/category/animal/{id}/edit', [App\Http\Controllers\animalController::class, 'edit'])->name('animal.edit');
Route::put('/category/animal/{id}', [App\Http\Controllers\animalController::class, 'update'])->name('animal.update');
Route::delete('/category/animal/{id}/delete', [App\Http\Controllers\animalController::class, 'destroy'])->name('animal.destroy');
