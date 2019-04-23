<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','HomeController@test')->name('home');


/********************** This is the admin routes **********************/

Route::get('/admin',[
    'as' => 'admin.index',
    'uses' => 'dashboardController@admin'
]);


Route::resource('/admin/usergroup', 'admin\userGroupController', [
    'as'=> 'admin'
]);

Route::resource('/admin/courses', 'admin\masterCoursesController', [
    'as'=> 'admin'
]);

Route::resource('/admin/global','admin\globalUserGroupController', [
    'as'=> 'admin'
]);

Route::get('/admin/global/destroy/{id_user}/{id_userGroup}', 'admin\globalUserGroupController@destroy', [
    'as'=> 'admin'
]);


/********************** This is the professor routes **********************/

Route::get('/professor',[
    'as' => 'professor.index',
    'uses' => 'dashboardController@professor'
]);

Route::resource('/professor/courses','professor\semesterCoursesController', [
    'as'=> 'professor'
]);

Route::resource('/professor/courses/{id_section}/enrollment','enrollmentController', [
    'as'=> 'professor'
]);

Route::resource('/professor/courses/{id_section}/quiz', 'professor\quizController', [
    'as'=> 'professor'
]);


Route::resource('/professor/courses/{id_section}/question', 'questionController', [
    'as'=> 'professor'
]);

Route::resource('/professor/courses/{id_section}/option', 'optionsController', [
    'as'=> 'professor'
]);




