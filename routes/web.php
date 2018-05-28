<?php
use Illuminate\Http\Request;

Route::view('/welcome', '.welcome');
Route::post('/send', function(Request $request) {
    
    dd($request->file('myfile'));

    return 'File was saved to Google Drive';
})->name('sendfile');

//main route
Route::get('/','GroupsController@index')->name('home');

//Authentication
Route::view('signup', 'auth.registration')->name('signup');
Route::post('register', 'AuthenticationController@register')->name('register');

Route::view('/login', 'auth.signin')->name('login');
Route::post('/login', 'AuthenticationController@login')->name('login-post');
Route::get('/logout', 'AuthenticationController@destroy')->name('logout');


//All about groups
Route::get('mygroups', 'GroupsController@myGroups')->name('mygroups');

Route::view('groups/new', 'groups.new')->name('creategroup');
Route::post('groups/create', 'GroupsController@create')->name("storegroup");
Route::get('/groups/delete/{id}', 'GroupsController@delete')->name('deletegroup');

Route::get('group/{id}/addtask', 'GroupsController@addTask')->name('addtask');
Route::post('group/{id}/addtaskpost', 'GroupsController@addTaskPost')->name('addtaskpost');


Route::get('/groups/join/{id}', 'GroupsController@join')->name('joingroup');
Route::get('/groups/leave/{id}', 'GroupsController@leave')->name('leavegroup');

Route::get('/groups/{id}', 'GroupsController@show')->name('group');
Route::get('/groups', 'GroupsController@search')->name('search');


//All about tasks
Route::get('mytasks', 'TasksController@myTasks')->name('mytasks');
Route::view('tasks/new', 'tasks.new')->name('createtask');
Route::post('tasks/create', 'TasksController@create')->name("storetask");

Route::get('/tasks/delete/{id}', 'TasksController@delete')->name('deletetask');

Route::get('/tasks/{id}', 'TasksController@show')->name('task');

//All about solutions
Route::get('mysolutions', 'SolutionsController@mySolutions')->name('mysolutions');

Route::get('tasks/{id}/newsolution', 'SolutionsController@newSolution')->name('createsolution');
Route::post('tasks/{id}/createsolution', 'SolutionsController@create')->name("storesolution");

Route::post('solutions/{id}/updatemark', 'SolutionsController@updatemark')->name('updatemark');