<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Auth
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // Cars
// Route::get('/cars', [CarController::class, 'index']);
// Route::get('/cars/featured', [CarController::class, 'featured']);
// Route::get('/cars/search', [CarController::class, 'search']);
// Route::get('/cars/{car}', [CarController::class, 'show']);

// // Branches
// Route::get('/branches', [BranchController::class, 'index']);
// Route::get('/branches/{branch}', [BranchController::class, 'show']);

// // Reviews
// Route::get('/cars/{car}/reviews', [ReviewController::class, 'index']);

// // Coupons
// Route::post('/coupons/check', [CouponController::class, 'check']);





// // Protected Routes
// Route::middleware('auth:sanctum')->group(function () {

//     // Auth
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/profile', [AuthController::class, 'profile']);
//     Route::post('/profile/update', [AuthController::class, 'updateProfile']);

//     // Bookings
//     Route::get('/bookings', [BookingController::class, 'index']);
//     Route::post('/bookings', [BookingController::class, 'store']);
//     Route::get('/bookings/{booking}', [BookingController::class, 'show']);
//     Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel']);

//     // Favorites
//     Route::get('/favorites', [FavouriteController::class, 'index']);
//     Route::post('/favorites/{car}', [FavouriteController::class, 'toggle']);

//     // Reviews
//     Route::post('/cars/{car}/reviews', [ReviewController::class, 'store']);

//     // Payments
//     Route::post('/payments/paymob', [PaymentController::class, 'paymob']);
//     Route::post('/payments/stripe', [PaymentController::class, 'stripe']);

//     // Notifications
//     Route::get('/notifications', [NotificationController::class, 'index']);
//     Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead']);
// });





// // Admin Routes
// Route::middleware(['auth:sanctum', 'admin'])
//     ->prefix('admin')
//     ->group(function () {

//     // Dashboard
//     Route::get('/dashboard', function () {
//         return response()->json([
//             'message' => 'Admin Dashboard'
//         ]);
//     });

//     // Cars
//     Route::post('/cars', [CarController::class, 'store']);
//     Route::put('/cars/{car}', [CarController::class, 'update']);
//     Route::delete('/cars/{car}', [CarController::class, 'destroy']);

//     // Branches
//     Route::post('/branches', [BranchController::class, 'store']);
//     Route::put('/branches/{branch}', [BranchController::class, 'update']);
//     Route::delete('/branches/{branch}', [BranchController::class, 'destroy']);

//     // Bookings
//     Route::get('/bookings', [BookingController::class, 'adminIndex']);
//     Route::post('/bookings/{booking}/confirm', [BookingController::class, 'confirm']);
//     Route::post('/bookings/{booking}/complete', [BookingController::class, 'complete']);

//     // Users
//     Route::get('/users', [AuthController::class, 'users']);
//     Route::get('/users/{user}', [AuthController::class, 'showUser']);
//     Route::delete('/users/{user}', [AuthController::class, 'destroyUser']);

//     // Coupons
//     Route::get('/coupons', [CouponController::class, 'index']);
//     Route::post('/coupons', [CouponController::class, 'store']);
//     Route::put('/coupons/{coupon}', [CouponController::class, 'update']);
//     Route::delete('/coupons/{coupon}', [CouponController::class, 'destroy']);

//     // Payments
//     Route::get('/payments', [PaymentController::class, 'index']);

//     // Notifications
//     Route::post('/notifications/send', [NotificationController::class, 'send']);
// });
