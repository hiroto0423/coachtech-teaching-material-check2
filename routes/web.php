<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;

Route::get('fill', [SchoolController::class,'fillSchool']);
Route::get('create', [SchoolController::class,'createSchool']);
Route::get('insert', [SchoolController::class,'insertSchool']);