<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\AuthController;

Route::post('/auth/signup', [AuthController::class, 'signUp']);
Route::post('/auth/signin', [AuthController::class, 'signIn']);

Route::resource('colors', ColorsController::class)->middleware('auth:sanctum');
