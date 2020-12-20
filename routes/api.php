<?php

use Illuminate\Http\Request;

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

Route::apiResource('tasks', 'TaskController');
Route::post('/tasks/{id}/task-completion', 'TaskCompletionController@store')->name('tasks.mark-as-complete');
Route::delete('/tasks/{id}/task-completion', 'TaskCompletionController@destroy')->name('tasks.mark-as-incomplete');
