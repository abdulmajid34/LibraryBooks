<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginUserAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ListBookController;
use App\Http\Controllers\BorrowedController;

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
    return view('landingpage');
});

Route::get('/login', [LoginUserAdminController::class, 'formLogin'])->name('login');
Route::post('login', [LoginUserAdminController::class, 'login']);
Route::get('/register', [RegisterController::class, 'formRegister'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::middleware(['auth:admin'])->group(function () {
    Route::post('/logout', 'App\Http\Controllers\LoginUserAdminController@logout');
    
    Route::get('/dashboard', [ListBookController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
    Route::view('/createBook','createFormBook')->name('createFormBook')->middleware('can:role,"admin"');
    Route::post('createBook', [ListBookController::class, 'store']);
    Route::get('/edit/{id}', [ListBookController::class, 'edit'])->name('updateBook')->middleware('can:role,"admin"');
    Route::put('/update/{id}', [ListBookController::class, 'update']);
    Route::delete('/destroy/{id}', [ListBookController::class, 'destroy']);
    
    Route::get('/borrowedBook', [BorrowedController::class, 'index'])->name('borrowed-book')->middleware('can:role,"admin"');
    Route::patch('/borrowed/{id}', [BorrowedController::class, 'borrowedBook']);
    Route::get('/mylist', [BorrowedController::class, 'mylist'])->name('mylist-book')->middleware('can:role,"user"');
    Route::delete('/returnBook/{id}', [BorrowedController::class, 'returnBook']);
});
