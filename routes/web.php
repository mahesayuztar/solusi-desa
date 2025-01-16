<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
    
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
    return view('user.home');
});


 
// User routes
Route::middleware('auth')->group(function () {
    Route::get('/user-list', [UserController::class, 'index']);
    Route::get('/verif-list', [UserController::class, 'verifiedUser']);
    Route::get('/add-user', [UserController::class, 'addUser']);
    Route::post('/save-user', [UserController::class, 'saveUser']);
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']);
    Route::get('/verif-user/{id}', [UserController::class, 'verifUser']);
});

// Report Routes
Route::middleware('auth')->group(function () {
    Route::get('/report-list', [ReportController::class, 'index'])->name('report-list');
    Route::get('/add-report', [ReportController::class, 'addReport']);
    Route::post('/save-report', [ReportController::class, 'saveReport']);
    Route::get('/edit-report/{id}', [ReportController::class, 'editReport']);
    Route::post('/update-report', [ReportController::class, 'updateReport']);
    Route::get('/delete-report/{id}', [ReportController::class, 'deleteReport']);
    Route::get('/table', function () {
        return view('list-table');
    });
    Route::get('/profil', function () {
        return view('profil');
    })->name('profil');
    Route::post('/edit-profil', [UserController::class, 'editProfil']);
    Route::get('/gui-edit-profil', function(){
        return view('edit-profil');
    })->name('gui-edit-profil');
    Route::get('/konfirmasi-report/{id}', [ReportController::class, 'konfirmasiReport']);
});

Auth::routes();

Route::post('/register', [App\Http\Controllers\RegisterController::class, 'register']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin')->middleware('is_admin');
Route::get('/dummynotif', function () {
    return view('table');
});