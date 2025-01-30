<?php

declare(strict_types=1);

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ImportArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');


Route::post('/import-articles', ImportArticleController::class);

Route::get('/categories', CategoryController::class);

Route::apiResources([
    'articles' => ArticleController::class,
]);
