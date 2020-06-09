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
Route::get('/todo', 'TodoController@index');
Route::get('/todo/{id}', 'TodoController@getUser');
Route::get('/getCurrentUser', 'LoginController@getCurrentUser');
Route::post('/login/checklogin', 'LoginController@checklogin');
Route::post('/login/register', 'LoginController@register');
Route::get('tasks/{id}', 'User1Controller@getUserTasks');
Route::delete('destroyUser/{id}', 'User1Controller@destroyUser');
Route::post('addtask/{id}', 'TasksController@store');
Route::post('maddtask/{id}', 'TasksController@maddtask');
Route::delete('destroytask/{id}/{uid}', 'TasksController@destroyTask');
Route::put('updatetask/{id}', 'TasksController@updatetask');

Route::get('/getallusers/{id}', 'User1Controller@getAllUser');
Route::post('/makesprvsr/{id}', 'User1Controller@makesprvsr');
Route::post('/removesprvsr/{id}', 'User1Controller@removesprvsr');
Route::delete('/removeovrsmbr/{sid}/{mid}', 'User1Controller@removeovrsmbr');
Route::post('/oversee/{id}', 'User1Controller@oversee');
Route::get('/overseelist/{id}', 'User1Controller@overseelist');
Route::get('/getSupervisors/{id}', 'User1Controller@getSupervisors');//updateuser
Route::put('updateuser/{id}', 'User1Controller@updateuser');

// Route::Resources(
//     [
//         'user1/{id}' => 'API\User1Controller@getCurrentUser',
//         'task' => 'API\TasksController',
//     ]
// );



//Route::get('tasks/{userid}', 'TaskController@index');
// Route::get('tasks/{userid}', 'TaskController@index');https://ffe01eaf.ngrok.io/api/destroytask/{id}/{uid}
// Route::get('task/{id}', 'TaskController@show');
// Route::post('task', 'TaskController@store');
// Route::put('task/{id}', 'TaskController@update');
// Route::delete('task/{id}', 'TaskController@delete');
// Route::delete('person', 'PersonController@index');

