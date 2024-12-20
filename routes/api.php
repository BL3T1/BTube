<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:api', 'role:admin,manager'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return 'Welcome Admin or Manager!';
    });
});
