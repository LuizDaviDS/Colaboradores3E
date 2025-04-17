<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ColaboradorController;

Route::get(uri:'/', action:[HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'destroy')->name('logout');
});

Route::get(uri:'/dashboard', action:[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get(uri:'/colaboradores', action:[ColaboradorController::class, 'index'])->middleware(['auth'])->name('colaboradores.index');
Route::get(uri:'/colaboradores/create', action:[ColaboradorController::class, 'create'])->middleware(['auth'])->name('colaboradores.create');
Route::post(uri:'/colaboradores', action:[ColaboradorController::class, 'store'])->middleware(['auth'])->name('colaboradores.store');
Route::get(uri:'/colaboradores/{colaborador}', action:[ColaboradorController::class, 'show'])->middleware(['auth'])->name('colaboradores.show');
Route::get(uri:'/colaboradores/{colaborador}/edit', action:[ColaboradorController::class, 'edit'])->middleware(['auth'])->name('colaboradores.edit');
Route::put(uri:'/colaboradores/{colaborador}', action:[ColaboradorController::class, 'update'])->middleware(['auth'])->name('colaboradores.update');
Route::delete(uri:'/colaboradores/{colaborador}', action:[ColaboradorController::class, 'destroy'])->middleware(['auth'])->name('colaboradores.destroy');