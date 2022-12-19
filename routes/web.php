<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductCongtroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckUserControlller;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Auth::routes();
Route::get('admin/home', [adminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::resource('/CheckUser', CheckUserControlller::class);

//production routes
Route::get('listproduct', [ProductCongtroller::class, 'index'])->name('indexproduct');
Route::get('addproduct', [ProductCongtroller::class, 'add'])->name('addproduct');
Route::post('storeproduct', [ProductCongtroller::class, 'storeproduct'])->name('storeproduct');
Route::get('editpro/{id}', [ProductCongtroller::class, 'editpro'])->name('editpro');
Route::post('update/{id}', [ProductCongtroller::class, 'update'])->name('update');
Route::get('delpro/{id}', [ProductCongtroller::class, 'delpro'])->name('delpro');