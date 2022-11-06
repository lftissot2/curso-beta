<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VagaCandidatoController;
use App\Http\Controllers\VagaController;
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

Route::get('/dashboard', [DashboardController::class, 'candidato']);
Route::get('/', [DashboardController::class, 'candidato']);

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::resources([
    'vagas' => VagaController::class,
    'candidatos' => CandidatoController::class,
    'vagas.candidatos' => VagaCandidatoController::class,
]);