<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/student',[\App\Http\Controllers\Api\StudentController::class,'student']);

//Route::prefix('products')->group(function () {
//    Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);          // Lấy danh sách sản phẩm
//    Route::post('/', [\App\Http\Controllers\ProductController::class, 'store']);         // Tạo mới sản phẩm
//    Route::get('/{id}', [\App\Http\Controllers\ProductController::class, 'show']);       // Xem thông tin chi tiết sản phẩm
//    Route::put('/{id}', [\App\Http\Controllers\ProductController::class, 'update']);     // Cập nhật thông tin sản phẩm
//    Route::delete('/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']); // Xóa sản phẩm
//});
Route::resource('products', \App\Http\Controllers\ProductController::class);
