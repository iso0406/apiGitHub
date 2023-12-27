<?php

use App\Http\Controllers\ApiGithubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::fallback(function () {
    return response()->json([
        'status' => 'Error',
        'message' => 'Recurso nao encontrado, favor entrar em contato com o administrador',
        'data' => null,
    ], 404);
});

Route::group(['prefix' => 'v1'], function () {
    //Route::get('/getUser/{user}',[ApiGithubController::class, 'show']);
    //Route::get('/getFollowers/{user}',[ApiGithubController::class, 'getFollowers']);
    Route::get('teste',[ApiGithubController::class, 'data']);
});
