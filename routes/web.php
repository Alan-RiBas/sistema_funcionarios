<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Livewire\Employees;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/funcionarios', [Employees::class, 'render'])->name('employees');
    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});
