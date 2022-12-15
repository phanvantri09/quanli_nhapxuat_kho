<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// trí add
use App\Http\Controllers\TKController;

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
Route::prefix('thukho')->group(function () {
    Route::get('/', [TKController::class, 'home'])->name("thukho");
    Route::get('them', [TKController::class, 'add'])->name("thukho.add");
    Route::post('them', [TKController::class, 'addpost'])->name("thukho.addPost");
    Route::get('sua/{id}', [TKController::class, 'edit'])->name("thukho.edit");
    Route::post('sua', [TKController::class, 'editPost'])->name("thukho.editPost");
    Route::get('delete/{id}', [TKController::class, 'delete'])->name("thukho.delete");


    Route::get('xuat', [TKController::class, 'xuat'])->name("thukho.xuat.add");
    Route::get('xuat_by_id/{id}', [TKController::class, 'xuat_by_id'])->name("thukho.xuat_by_id.add");
    Route::post('xuatPost', [TKController::class, 'xuatPost'])->name("thukho.xuat.addPost");

});
