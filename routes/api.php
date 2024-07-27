<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get("/posts", [PostController::class, "index"]);
Route::post("/posts", [PostController::class, "store"]);

Route::get("/websites", [WebsiteController::class, "index"]);

Route::get("/subscribers", [SubscriberController::class, "index"]);
Route::put("/subscribers", [SubscriberController::class, "update"]);
Route::get("/subscribers/{id}", [SubscriberController::class, "show"]);
