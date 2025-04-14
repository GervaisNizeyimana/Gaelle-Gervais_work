<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// // });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get("/",[CustomerController::class,'home'])->name('home');
Route::get("/register",[CustomerController::class,'register'])->name('register');
Route::get("/login",[CustomerController::class,'loginpage'])->name('login');
Route::post("/store",[CustomerController::class,'store'])->name('store');
Route::post("/dashboard",[CustomerController::class,'login'])->name('dashboard');
Route::post("/customerDashboard",[CustomerController::class,'handleTransaction'])->name('dashboard.action');

Route::get("/customerDashboard",[CustomerController::class,'go'])->name('go');
Route::post("/logout",[CustomerController::class,'logout'])->name('logout');
// Route::post("/Dashboard",[CustomerController::class,'show'])->name('logincode');

// require __DIR__.'/auth.php';
