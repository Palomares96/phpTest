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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('users', 'UserController@listUsers');
Route::get('users/active', 'UserController@listActiveUsers');
Route::get('users/{user}', 'UserController@findUser');
Route::get('users/{user}/projects', 'UserController@findProjectsUser');
Route::post('users', 'UserController@addUser');
Route::put('users/{user}', 'UserController@updateUserInfo');
Route::delete('users/{user}', 'UserController@deleteUser');

Route::get('projects', 'ProjectController@listProjects');
Route::get('projects/active', 'ProjectController@listActiveProjects');
Route::get('projects/{project}', 'ProjectController@findProject');
Route::get('projects/{project}/users', 'ProjectController@findUsersProject');
Route::post('projects', 'ProjectController@addProject');
Route::put('projects/{project}', 'ProjectController@updateProjectInfo');
Route::delete('projects/{project}', 'ProjectController@deleteProject');
