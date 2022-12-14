<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//get all animals
Route::get('/animal', [AnimalController::class, 'index']);

//get the details of animal
Route::get('/animal/{id}', [AnimalController::class, 'show']);

Route::post('/animal/disease/{id}',[AnimalController::class, 'addDisease']);

//store/create animal 
Route::post('/animal' ,[AnimalController::class,'store']);

// update details of animal
Route::put('/animal/{id}', [AnimalController::class, 'update']);

// detach disease from animal
Route::delete('/animal/disease/{id}',[AnimalController::class, 'removeDisease']);

//delete animal
Route::delete('/animal/{id}', [AnimalController::class, 'destroy']);