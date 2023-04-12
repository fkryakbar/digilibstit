<?php

use App\Http\Controllers\AddCollectionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/detail/{u_id}', [LandingPageController::class, 'detail']);
Route::get('/submission', [SubmissionController::class, 'index']);
Route::post('/submission', [SubmissionController::class, 'store']);
Route::get('/library/submission/{file_id}', [FileController::class, 'index']);

// admin
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/edit/{u_id}', [DashboardController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/edit/{u_id}', [DashboardController::class, 'update'])->middleware('auth');
Route::get('/dashboard/settings', [SettingsController::class, 'index'])->middleware('auth');
Route::post('/dashboard/settings', [SettingsController::class, 'update'])->middleware('auth');
Route::get('/dashboard/add', [AddCollectionController::class, 'index'])->middleware('auth');
Route::post('/dashboard/add', [AddCollectionController::class, 'store'])->middleware('auth');
Route::get('/file/{file_id}/delete', [FileController::class, 'delete'])->middleware('auth');
Route::get('/submission/delete/{u_id}', [SubmissionController::class, 'delete']);
