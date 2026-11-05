<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\GepController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/adatbazis', [SiteController::class, 'database'])->name('adatbazis');
Route::get('/kapcsolat', [SiteController::class, 'contact'])->name('kapcsolat');
Route::post('/kapcsolat', [SiteController::class, 'sendContact'])->name('kapcsolat.send');
Route::get('/diagram', [SiteController::class, 'chart'])->name('diagram');
Route::get('/teszt', [CalculatorController::class, 'showForm'])->name('teszt');
Route::post('/teszt', [CalculatorController::class, 'calculate'])->name('teszt.calculate');

Route::middleware(['auth', 'role:1,2'])->group(function () {
    Route::get('/uzenetek', [SiteController::class, 'messages'])->name('uzenetek');
    Route::post('/kijelentkezes', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/crud', [GepController::class, 'index'])->name('crud');
    Route::get('/crud/uj', [GepController::class, 'create'])->name('crud.create');
    Route::post('/crud', [GepController::class, 'store'])->name('crud.store');
    Route::get('/crud/{gep}/szerkesztes', [GepController::class, 'edit'])->name('crud.edit');
    Route::put('/crud/{gep}', [GepController::class, 'update'])->name('crud.update');
    Route::delete('/crud/{gep}', [GepController::class, 'destroy'])->name('crud.delete');
});

Route::get('/bejelentkezes', [AuthController::class, 'loginForm'])->name('login');
Route::post('/bejelentkezes', [AuthController::class, 'login'])->name('login.post');
Route::get('/regisztracio', [AuthController::class, 'registerForm'])->name('register');
Route::post('/regisztracio', [AuthController::class, 'register'])->name('register.post');
