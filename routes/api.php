<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CONTROLADORES
use App\Http\Controllers\GroupController; //Necesario
use App\Http\Controllers\StudentController; //Necesario
use App\Http\Controllers\ApisExController; //Necesario
use App\Http\Controllers\AuthController; //Necesario




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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//ENDPOINTS//

//CRUD///////////////
//CREATE
Route::post('/createGroup', [GroupController::class, 'createGroup']); //http://localhost:8000/api/createGroup
Route::post('/createStudent', [StudentController::class, 'createStudent']); //http://localhost:8000/api/createStudent
//READ
Route::get('/getGroups', [GroupController::class, 'getGroups']); //http://localhost:8000/api/getGroups
Route::get('/getStudents', [StudentController::class, 'getStudents']); //http://localhost:8000/api/getStudents
//UPDATE
Route::post('/updateGroup/{id}', [GroupController::class, 'updateGroup'], function ($id) {}); //http://localhost:8000/api/updateGroup/{id}
Route::post('/updateStudent/{id}', [StudentController::class, 'updateStudent'], function ($id) {}); //http://localhost:8000/api/updateStudent/{id}
//DELETE
Route::delete('/deleteGroup/{id}', [GroupController::class, 'deleteGroup'], function ($id){}); //http://localhost:8000/api/deleteGroup/{id}
Route::delete('/deleteStudent/{id}', [StudentController::class, 'deleteStudent'], function ($id){}); //http://localhost:8000/api/deleteStudent/{id}

//API EXTERNA/////////
Route::get('/getApiAjena', [ApisExController::class, 'getApiAjena']); //http://localhost:8000/api/getApiAjena
Route::get('/getAPIGuzzler', [ApisExController::class, 'getAPIGuzzler']); //http://localhost:8000/api/getAPIGuzzler

//API ADAFRUIT/////////
Route::get('/getNFC', [ApisExController::class, 'getNFC']); //http://localhost:8000/api/getNFC
Route::get('/getFirstNFC', [ApisExController::class, 'getFirstNFC']); //http://localhost:8000/api/getFirstNFC
Route::get('/getDateNFC', [ApisExController::class, 'getDateNFC']); //http://localhost:8000/api/getDateNFC
Route::get('/getRangeNFC', [ApisExController::class, 'getRangeNFC']); //http://localhost:8000/api/getRangeNFC
Route::get('/getJustNFC', [ApisExController::class, 'getJustNFC']); //http://localhost:8000/api/getJustNFC


//USERS AUTH/////////
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

