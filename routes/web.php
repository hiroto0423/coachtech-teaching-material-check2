<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Middleware\FirstMiddleware;
use App\Http\Controllers\AuthorController;

Route::get('/middleware', [AuthorController::class, 'get']);
Route::post('/middleware', [AuthorController::class, 'post']);//変更

Route::get('fill', [SchoolController::class,'fillSchool']);
Route::get('create', [SchoolController::class,'createSchool']);
Route::get('insert', [SchoolController::class,'insertSchool']);