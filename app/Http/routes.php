<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth','validateBackHistory']],function()
{
    Route::get('Results/{semester}', ['uses'=>'SemesterController@showResults','as'=>'results']);

    Route::get('{semester}/AddSubject', 'SemesterController@addSubject');

    Route::post('{semester}/AddSubject', 'SemesterController@postAddSubject');

    Route::get('{semester}/EditSubject/{subjectname}', 'SemesterController@editSubject');

    Route::post('{semester}/EditSubject/{subjectname}', 'SemesterController@postEditSubject');

    Route::get('{semester}/DeleteSubject/{subjectname}', 'SemesterController@deleteSubject');

    Route::get('LogOutStudent','StudentController@logOutStudent');
});
Route::get('AddStudent','StudentController@addStudent');

Route::post('AddStudent','StudentController@postAddStudent');

Route::get('LogStudent',['uses'=>'StudentController@logStudent','as'=>'home']);

Route::post('LogStudent','StudentController@postlogStudent');



