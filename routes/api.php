<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CONTROLADORES
use App\Http\Controllers\GroupController; //Necesario
use App\Http\Controllers\StudentController; //Necesario
use App\Http\Controllers\ApisExController; //Necesario



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
//CRUD///////////////
//CREATE
Route::post('/createGroup', [GroupController::class, 'createGroup']); //http://localhost:8000/api/createGroup
Route::post('/createStudent', [StudentController::class, 'createStudent']); //http://localhost:8000/api/createStudent
//READ

//UPDATE

//DELETE

//API EXTERNA/////////
Route::get('/getApiAjena', [ApisExController::class, 'getApiAjena']); //http://localhost:8000/api/getApiAjena

