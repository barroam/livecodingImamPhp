<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post("login",[AuthController::class,"login"]);

Route::middleware("auth")->group(
    function (){
        Route::post("logout",[AuthController::class,"logout"]);
        Route::post("refresh",[AuthController::class,"refresh"]);
    }
);
Route::apiResource('livres',LivreResource::class)->only('index','show');


