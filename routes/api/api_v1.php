<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRememberToken;

Route::apiResource("users", UserController::class); // CRUD
