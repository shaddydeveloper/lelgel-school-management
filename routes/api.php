<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('terms', [App\Http\Controllers\TermsController::class, 'termsApi'])->name('terms');
Route::get('notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications');
Route::post('create_notification', [App\Http\Controllers\NotificationsController::class, 'store'])->name('create_notifications');
Route::get('products', [App\Http\Controllers\api\ProductsController::class, 'index'])->name('products');
Route::get('exercise_books_data', [App\Http\Controllers\api\ExercisebooksController::class, 'index'])->name('exercise_books_data');
Route::get('update_limit/{limit}', [App\Http\Controllers\api\ExercisebooksController::class, 'updateLimit'])->name('update_limit');
Route::get('all_limits', [App\Http\Controllers\api\ExercisebooksController::class, 'allLimits'])->name('all_limits');