<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// normal route
/* 
Route::get('student/home', [HomeController::class, 'home']);
Route::get('student/show', [HomeController::class, 'show']);
Route::get('student/add', [HomeController::class, 'add']);
Route::get('student/remove', [HomeController::class, 'remove']); */



// route group with prefix 
/* Route::prefix('student')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/show', [HomeController::class, 'show']);
    Route::get('/add', [HomeController::class, 'add']);
    Route::get('/remove', [HomeController::class, 'remove']);
});
 */



//  route group with controller 
/*  Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'home');
    Route::get('/show', 'show');
 }); */



// route group with prefix and controller together 
/*  Route::prefix('student')->controller(HomeController::class)->group(function(){
    Route::get('/home', 'home');
    Route::get('/show', 'show');
 }); */



// route group with prefix and controller together with perameter  
//  Route::prefix('student')->controller(HomeController::class)->group(function(){
//     Route::get('/home', 'home');
//     Route::get('/show/{id}', 'show');
//     Route::get('/remove/{id}', 'remove');
//  });



// global middleware
/* Route::get('/home', [MiddlewareController::class, 'home']);
Route::get('/show', [MiddlewareController::class, 'show']);
Route::get('/add', [MiddlewareController::class, 'add']);
Route::get('/remove', [MiddlewareController::class, 'remove']); */



// group middleware 
/* Route::get('/home', [MiddlewareController::class, 'home'])->middleware('check1');
Route::get('/show', [MiddlewareController::class, 'show']);
Route::get('/add', [MiddlewareController::class, 'add'])->middleware('check1');
Route::get('/remove', [MiddlewareController::class, 'remove']); */



// for applying group middleware on multiple routes 
/* Route::middleware('check1')->group(function () {
    Route::get('/home', [MiddlewareController::class, 'home']);
    Route::get('/show', [MiddlewareController::class, 'show']);
    Route::get('/add', [MiddlewareController::class, 'add']);
    Route::get('/remove', [MiddlewareController::class, 'remove']);
}); */



// assigning middleware to routes 
Route::get('/home', [MiddlewareController::class, 'home'])->middleware(AgeCheck::class);
Route::get('/show', [MiddlewareController::class, 'show'])->middleware(CountryCheck::class);
Route::get('/add', [MiddlewareController::class, 'add']);
// for use multiple middlewares 
Route::get('/remove', [MiddlewareController::class, 'remove'])->middleware([AgeCheck::class, CountryCheck::class]);
