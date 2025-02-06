<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/course/{userId}/{courseId}', [CourseController::class, 'show']);
