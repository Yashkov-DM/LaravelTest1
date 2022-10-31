<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Маршрут private который работает и отдает данные текущего пользователя (с валидным JWT токеном)
Route::get('/externalapi', 'Api\ExternalController@externalApi');

// Маршрут login который отдает JWT токен
Route::post('login', 'Api\Auth\LoginController@login');

// Маршруты сброса пароля
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@showResetForm');
