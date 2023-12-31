<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])
    ->name('admin.home')
   ;
    // Route::resource('/index', AdminController::class);
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/index',[AdminController::class,'index'])->name('index');
    Route::get('/create', [AdminController::class,'create'])->name('create');
    Route::post('/store',[AdminController::class,'store'])->name('store');
});
