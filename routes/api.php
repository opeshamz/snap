<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserAuthApiController::class, 'login']);
Route::post('/register', [UserAuthApiController::class, 'register']);

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout',  [UserAuthApiController::class, 'login']);

    Route::get('user', 'ApiController@getAuthUser');

    Route::get('posts', 'ProductController@index');
    Route::get('post/{id}', 'ProductController@show');
    Route::post('post', 'ProductController@store');
    Route::put('post/{id}', 'ProductController@update');
    Route::delete('post/{id}', 'ProductController@destroy');
});
