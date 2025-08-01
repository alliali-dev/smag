<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// register
Route::post('inscription', [UserController::class, 'store']);
// login
Route::post('login', [UserController::class, 'authenticate']);
// list
Route::get('list', [UserController::class, 'listUser']);
// update
Route::post('modification', [UserController::class, 'update']);
