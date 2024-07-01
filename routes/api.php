<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('listuser', 'App\Http\Controllers\ListUserController');
Route::get('user/{id}', 'App\Http\Controllers\GetUserController');
Route::post('adduser', 'App\Api_Laravel\User\UserInterface\CreateUserController');
Route::delete('deleteuser/{id}', 'App\Api_Laravel\User\UserInterface\DeleteUserController');




Route::get('/greating', function () {
    return 'Hello Worldv';
});
