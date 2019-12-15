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

Route::get('/', 'PagesController@getIndex');

Auth::routes();

Route::get('/registration/verification', 'PagesController@getVerification');

Route::prefix('schedules')->group(function () {
    Route::get('new', [
        'as' => 'new',
        'uses' => 'ScheduleController@create'
    ]);

    Route::get('view/all', [
        'as' => 'view.all',
        'uses' => 'ScheduleController@index'
    ]);

    Route::paginate('view/completed', [
        'as' => 'view.completed',
        'uses' => 'ScheduleController@index'
    ]);

    Route::paginate('view/pending', [
        'as' => 'view.pending',
        'uses' => 'ScheduleController@index'
    ]);

    Route::get('{id}/pending', [
        'as' => 'single',
        'uses' => 'ScheduleController@show'
    ]);
});


Route::post('\schedules', [
    'as' => 'store',
    'uses' => 'ScheduleController@store'
]);

Route::put('/registration/verification/{user}',  [
    'as' => 'resend',
    'uses' => 'VerificationController@update'
]);

Route::post('/registration/verification', [
    'as' => 'verification',
    'uses' => 'VerificationController@verify'
]);

Route::get('/registration/activation/{id}/{token}', [
    'as' => 'activation',
    'uses' => 'ActivationController@activate'
]);


