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

Route::get('/test', [
    'as'=> 'test',
    'uses'=>'HomeController@test'
])->middleware('admin');


/********************** This is the admin routes **********************/

Route::get('/admin',[
    'as' => 'admin.index',
    'uses' => 'dashboardController@admin'
])->middleware('admin');


Route::resource('/admin/usergroup', 'admin\userGroupController', [
    'as'=> 'admin'
])->middleware('admin');

Route::resource('/admin/courses', 'admin\masterCoursesController', [
    'as'=> 'admin'
])->middleware('admin');

Route::resource('/admin/global','admin\globalUserGroupController', [
    'as'=> 'admin'
])->middleware('admin');

Route::get('/admin/global/destroy/{id_user}/{id_userGroup}', 'admin\globalUserGroupController@destroy', [
    'as'=> 'admin'
])->middleware('admin');


/********************** This is the professor routes **********************/

Route::get('/professor',[
    'as' => 'professor.index',
    'uses' => 'dashboardController@professor'
])->middleware('professor');

Route::resource('/professor/courses','professor\semesterCoursesController', [
    'as'=> 'professor'
])->middleware('professor');

Route::resource('/professor/courses/{id_section}/enrollment','enrollmentController', [
    'as'=> 'professor'
])->middleware('professor');

Route::get('/professor/courses/{id_section}/enrollment/{id}/delete', 'enrollmentController@destroy');


Route::resource('/professor/courses/{id_section}/quiz', 'professor\quizController', [
    'as'=> 'professor'
])->middleware('professor');

Route::resource('/professor/courses/{id_section}/question', 'professor\questionController', [
    'as'=> 'professor'
])->middleware('professor');

Route::resource('/professor/courses/{id_section}/option', 'professor\optionsController', [
    'as'=> 'professor'
])->middleware('professor');

Route::get('/professor/courses/{id_section}/view','professor\semesterCoursesController@viewClass')->middleware('professor');

/********************** THIS IS WHERE THE STUDENT ROUTES ARE ***********************/

Route::get('/student',[
    'as' => 'student.index',
    'uses' => 'dashboardController@student'
])->middleware('student');

Route::resource('/student/courses','student\studentController',[
    'as'=>'student'
])->middleware('student');

Route::resource('/student/enroll','enrollmentController',[
    'as'=>'student'
])->middleware('student');

Route::resource('/student/courses/{id_section}/quiz','student\student_answersController',[
    'as' => 'student'
])->middleware('student');

Route::get('/student/courses/{id_section}/quiz/view/{id_quiz}', 'student\student_answersController@viewAnswers');
