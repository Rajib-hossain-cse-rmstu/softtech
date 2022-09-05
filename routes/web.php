<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgetPasswordController;

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

Route::get('/', [CustomerController::class, 'index'])->name('home');

Route::post('/login', [CustomerController::class, 'login'])->name('login');
Route::post('/store', [CustomerController::class, 'store'])->name('store');
Route::get('/dashboard',[CustomerController::class, 'dashboard'])->name('dashboard');


Route::get('/customer/reset-password/email/form/', [ForgetPasswordController::class, 'emailCheckForm'])->name('check');
Route::post('/customer/reset-password/email/form/store', [ForgetPasswordController::class, 'emailCheckFormStore'])->name('passwordstore');
Route::get('/customer/reset-new-password/form/{token}', [ForgetPasswordController::class, 'newPassword'])->name('newresetpassword');
Route::post('/customer/reset-new-password/form/store', [ForgetPasswordController::class, 'newPasswordStore'])->name('newrestpasswordstore');
