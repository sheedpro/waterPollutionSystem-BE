<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PollutedSiteController;
Route::prefix('pollution')->group(function(){
   
    Route::post('register', [UserController::class,'register']);
    Route::post('login', [UserController::class,'login']);
    Route::post('add-polluted-sites', [PollutedSiteController::class,'store']);
    Route::get('user/{id}', [UserController::class, 'getUserById']);
    Route::get('polluted-sites', [PollutedSiteController::class, 'index']);
});