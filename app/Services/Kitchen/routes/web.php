<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'kitchen'], function() {
    Route::view('/', 'kitchen::welcome');
});

Route::group(['prefix' => 'kitchen', 'middleware' => ['auth']], function () {
    Route::view('/recipes/new', 'kitchen::new');
    Route::post('/recipes', [RecipeController::class, 'add']);
});
