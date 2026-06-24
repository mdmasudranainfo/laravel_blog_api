<?php

use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'This is a test route.', 'status' => 'success']);
});

// blog
// Route::get("/blog", [BlogController::class, 'index'])->name('blog.index');
// Route::post("/blog", [BlogController::class, 'store'])->name('blog.store');
// Route::get("/blog/{id}", [BlogController::class, 'show'])->name('blog.show');



// Route::apiResource('blog', BlogController::class);

Route::prefix('v1')->group(function () {
    Route::apiResource('blog', BlogController::class);
});


Route::prefix('v1')->group(function () {
    Route::apiResource('posts', PostController::class);
});
