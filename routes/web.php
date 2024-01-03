<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EventController;

use App\Http\Controllers\SignupController;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminDashboardController;


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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin-login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminLoginController::class, 'login']);

Route::get('/signup', [SignupController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [EventController::class, 'getAllEvents'])->name('home');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');
});


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin-dashboard');
    Route::post('/admin-dashboard', [AdminDashboardController::class, 'store'])->name('events.store');
});



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
