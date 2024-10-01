<?php

use App\Http\Controllers\Api\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// route for Category
Route::get('/category', [CategoryController::class, 'index']);
