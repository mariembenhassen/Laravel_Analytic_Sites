<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

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

// Your tracking endpoint (public, no auth or CSRF)
Route::post('/track', [TrackingController::class, 'store']);

// Optional: default Laravel API example (you can keep or delete)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
