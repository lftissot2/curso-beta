<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\VagaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    'vagas' => VagaController::class,
    'candidatos' => CandidatoController::class,
    'vagas.candidatos' => VagaController::class,
    'candidatos.vagas' => VagaController::class,
]);
