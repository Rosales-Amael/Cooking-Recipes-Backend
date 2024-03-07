<?php

use App\Http\Controllers\AvatarController;
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

Route::post('/update-avatar', [\App\Http\Controllers\Api\AvatarController::class, 'updateAvatar']);
Route::delete('/delete-user', [\App\Http\Controllers\Api\UserController::class, 'deleteUser']);
Route::patch('/edit-user', [\App\Http\Controllers\Api\UserController::class, 'editUser']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

