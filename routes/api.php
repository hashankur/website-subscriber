<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/user", function (Request $request) {
    return $request->user();
});

Route::get("/posts", [PostController::class, "index"]);
Route::post("/posts", [PostController::class, "store"]);

Route::get("/websites", [WebsiteController::class, "index"]);
