<?php

use App\Models\listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\ApplicationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//User Controller
Route::get('/login', [UserController::class, 'auth'])->name('login')->middleware('guest');
Route::post('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');


//Listings Controller
Route::get('/listings/create', [ListingsController::class, 'create'])->middleware('auth');
Route::get('/', [ListingsController::class, 'index']);
Route::post('/listings', [ListingsController::class, 'store'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->middleware('auth');
Route::put('/listings/{listing}', [ListingsController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy'])->middleware('auth');
Route::get('/listings/manage', [ListingsController::class, 'manage'])->middleware('auth');

Route::get('/listings/{listing}', [ListingsController::class, 'show']);

//Applications Controller
Route::post('/application/{listing}', [ApplicationsController::class, 'store'])->middleware('auth');
Route::get('/apply/{listing}', [ApplicationsController::class, 'apply'])->middleware('auth');
Route::get('/applications', [ApplicationsController::class, 'view'])->middleware('auth');
Route::delete('/applications/{application}', [ApplicationsController::class, 'destroy'])->middleware('auth');
Route::get('/applications/{application}', [ApplicationsController::class, 'show'])->middleware('auth');
Route::get('/listings/{listing}/applications', [ApplicationsController::class, 'viewApplications'])->middleware('auth');
