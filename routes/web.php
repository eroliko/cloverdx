<?php

use App\Http\Containers\ClientContainer\Controllers\ClientController;
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

Route::get('clients', [ClientController::class, 'index']);
Route::post('clients', [ClientController::class, 'store'])
    ->name('clients.store');