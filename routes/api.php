<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PupilController;

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

Route::resource('/school', SchoolController::class, ['only' => ['index', 'show']]);
Route::resource('/school', SchoolController::class, ['except' => ['index', 'show']])->middleware('auth:sanctum');

Route::resource('/pupil', PupilController::class, ['only' => ['index', 'show']]);
Route::resource('/pupil', PupilController::class, ['except' => ['index', 'show']])->middleware('auth:sanctum');
// Route::get('/pupil/unapproved/{id}', PupilController::class, 'unapproved')->middleware('auth:sanctum');
// Route::get('/pupil/approve/{id}', PupilController::class, 'approve')->middleware('auth:sanctum');
// Route::post('/pupil/approve', PupilController::class, ['approve'])->middleware('auth:sanctum');

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:sanctum');
