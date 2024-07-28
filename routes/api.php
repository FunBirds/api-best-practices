<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return response()->json([
        "code"=>200,
        "message" => 'Welcome to the API please choose API version and start using it',
    ]);
});
