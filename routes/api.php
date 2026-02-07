<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes publiques (sans authentification)
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Routes protégées (avec authentification)
Route::middleware('auth:sanctum')->group(function() {
    // Auth routes
    Route::get('/auth/user', [AuthController::class, 'user']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // Admin routes
    Route::middleware('role:admin')->group(function() {
        //Categories routes
        Route::get('/categories/{categories}', [CategorieController::class, 'show']);
        Route::post('/categories', [CategorieController::class, 'store']);
        Route::put('/categories/{categories}', [CategorieController::class, 'update']);
        Route::delete('/categories/{categories}', [CategorieController::class, 'destroy']);

        //Statuts routes
        Route::get('/statuts/{statuts}', [StatutController::class, 'show']);
        Route::post('/statuts', [StatutController::class, 'store']);
        Route::put('/statuts/{statuts}', [StatutController::class, 'update']);
        Route::delete('/statuts/{statuts}', [StatutController::class, 'destroy']);

        //Incidents routes
        Route::put('/incidents/{incident}', [IncidentController::class, 'update']);
        Route::delete('/incidents/{incident}', [IncidentController::class, 'destroy']);
    });

    //Public routes
    Route::get('/categories', [CategorieController::class, 'index']);

    Route::get('/statuts', [StatutController::class, 'index']);
    
    Route::get('/incidents', [IncidentController::class, 'index']);
    Route::get('/incidents/{incident}', [IncidentController::class, 'show']);
    Route::post('/incidents', [IncidentController::class, 'store']);
});

