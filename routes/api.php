<?php
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\CartItemController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EmailController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);



Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


Route::get('/cart-items', [CartItemController::class, 'index']);
Route::post('/cart-items', [CartItemController::class, 'store']);
Route::put('/cart-items/{id}', [CartItemController::class, 'update']);
Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);
Route::put('/cart-items/{id}/quantity', [CartItemController::class, 'updateQuantity']);


Route::post('payments', [PaymentController::class, 'store']);
Route::get('payments', [PaymentController::class, 'index']);


Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/users', [UserController::class, 'checkEmail']);
// Route::post('/users/reset-password', [UserController::class, 'resetPassword']);




Route::post('/users/generate-otp', [UserController::class, 'generateOTP']);


Route::post('/send-otp', [EmailController::class, 'sendOTP']);
Route::post('/reset-password', [UserController::class, 'resetPassword']);

Route::post('/users/verify-otp', [UserController::class, 'verifyOtp']);

