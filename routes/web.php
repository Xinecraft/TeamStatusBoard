<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

/**
 * Guest Routes
 */
Route::get('/', [WelcomeController::class, 'welcome']);


/**
 * Authenticated Routes
 */
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
