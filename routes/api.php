<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/login', 'LoginController@index');
Route::get('/getCurrentUser', 'LoginController@getCurrentUser');
Route::post('/login/checklogin', 'LoginController@checklogin');
Route::get('tasks/{id}', 'User1Controller@getUserTasks');
Route::post('addtask/{id}', 'TasksController@store');
Route::delete('destroytask/{id}/{uid}', 'TasksController@destroyTask');
Route::put('updatetask/{id}', 'TasksController@updatetask');
//Route::get('tasks/{userid}', 'TaskController@index');
// Route::get('tasks/{userid}', 'TaskController@index');
// Route::get('task/{id}', 'TaskController@show');
// Route::post('task', 'TaskController@store');
// Route::put('task/{id}', 'TaskController@update');
// Route::delete('task/{id}', 'TaskController@delete');
// Route::delete('person', 'PersonController@index');

