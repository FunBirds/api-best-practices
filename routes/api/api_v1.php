<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::apiResource("users", UserController::class); // CRUD
Route::apiResource("category", CategoryController::class); // CRUD
Route::apiResource("article", ArticleController::class); // CRUD
