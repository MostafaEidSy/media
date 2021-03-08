<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Site'], function (){
    Route::group(['middleware' => 'guest:web'], function (){
        Route::get('/login', 'GeneralController@getLogin')->name('getLogin');
        Route::post('/login', 'GeneralController@login')->name('login');
        Route::get('/sign-up', 'GeneralController@getSignUp')->name('getSignUp');
        Route::post('/sign-up', 'GeneralController@signUp')->name('signUp');
    });
   Route::get('/', 'GeneralController@index')->name('index');
   Route::get('/pricing', 'GeneralController@pricing')->name('pricing');
   Route::get('/{slug}', 'GeneralController@showDetails')->name('show.details');
   Route::group(['middleware' => 'auth:web'], function (){
       Route::get('/logout', 'GeneralController@logout')->name('logout');
       Route::get('/manage-profile', 'GeneralController@manage')->name('manage.profile');
       Route::post('/manage-profile/{id}', 'GeneralController@updateManage')->name('manage.profile.update');
       Route::get('/setting-profile', 'GeneralController@settingProfile')->name('manage.profile.setting');
       Route::get('/add-favorites/{id}', 'GeneralController@addFavorites')->name('add.favorites');
       Route::get('watch-show/{slug}/{videoId?}', 'GeneralController@watchShow')->name('watch.show');
   });
});
