<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
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

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/phpinfo', [HomeController::class, 'phpinfo']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth'])->name('dashboard');

Route::get('/pets', [PetController::class, 'index'])
    ->middleware(['auth'])->name('viewPets');

require __DIR__.'/auth.php';
