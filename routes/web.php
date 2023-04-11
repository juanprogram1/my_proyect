<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticathedSessionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name ('home');

Route::view('/contact', 'contact')->name ('contact');


Route::get('/blog', [PostController::class, 'index'])->name ('Empleados.index');

Route::get('/blog/create', [PostController::class, 'create'])->name ('empleados.create');

Route::post('/blog', [PostController::class, 'store'])->name('empleados.store');

Route::get('/blog/{empleado}', [PostController::class, 'show'])->name ('Empleados.show');

Route::get('/blog/{empleado}/edit', [PostController::class, 'edit'])->name ('Empleados.edit');

Route::patch('/blog/{empleado}', [PostController::class, 'update'])->name ('Empleados.update');

Route::delete('/blog/{empleado}', [PostController::class, 'destroy'])->name ('Empleados.destroy');

Route::view('/about', 'about')->name ('about'); 

//Login
Route::view('/login', 'auth.login')->name('login');

Route::post('/login', [AuthenticathedSessionController::class, 'store']);

Route::post('/logout', [AuthenticathedSessionController::class, 'destroy'])->name('logout');

//register
Route::view('/register', 'auth.register')->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);