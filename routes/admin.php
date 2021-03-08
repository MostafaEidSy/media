<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cp', 'namespace' => 'Admin', 'middleware' => 'guest:admin'], function (){
   Route::get('/login', 'GeneralController@getLogin')->name('admin.getLogin');
   Route::post('/login', 'GeneralController@login')->name('admin.login');
});

Route::group(['prefix' => 'cp/admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function (){
   Route::get('/', 'GeneralController@index')->name('admin.index');
   Route::get('/edit-profile', 'GeneralController@editProfile')->name('admin.edit.profile');
   Route::post('/edit-profile-info/{id}', 'GeneralController@UpdateProfileInfo')->name('admin.update.profile.info');
   Route::post('/edit-profile-pass/{id}', 'GeneralController@UpdateProfilePass')->name('admin.update.profile.pass');
   Route::post('/edit-profile-con/{id}', 'GeneralController@UpdateProfileCon')->name('admin.update.profile.con');
   Route::get('/account-setting', 'GeneralController@accountSetting')->name('admin.edit.setting');
   Route::post('/account-setting', 'GeneralController@updateAccountSetting')->name('admin.edit.update.setting');

   Route::group(['prefix' => 'ratings'], function (){
       Route::get('/', 'RatingController@index')->name('admin.rating.index');
   });

   Route::group(['prefix' => 'comments'], function (){
      Route::get('/', 'CommentController@index')->name('admin.comment.index');
   });

   Route::group(['prefix' => 'users'], function (){
       Route::get('/', 'UsersController@index')->name('admin.users.index');
   });

   Route::group(['prefix' => 'categories'], function (){
      Route::get('/', 'CategoriesController@index')->name('admin.category.index');
      Route::get('/delete/{id}', 'CategoriesController@delete')->name('admin.category.delete');
      Route::get('/add-category', 'CategoriesController@create')->name('admin.category.create');
      Route::post('/story', 'CategoriesController@story')->name('admin.category.story');
      Route::get('/edit/{id}', 'CategoriesController@edit')->name('admin.category.edit');
      Route::post('/update/{id}', 'CategoriesController@update')->name('admin.category.update');
   });

   Route::group(['prefix' => 'videos'], function (){
      Route::get('/', 'VideoController@index')->name('admin.video.index');
      Route::get('/add-video', 'VideoController@create')->name('admin.video.create');
      Route::post('/upload-video', 'VideoController@uploadVideo')->name('admin.video.create.upload.video');
      Route::post('/story', 'VideoController@story')->name('admin.video.story');
      Route::get('/delete/{id}', 'VideoController@delete')->name('admin.video.delete');
      Route::get('/edit/{id}', 'VideoController@edit')->name('admin.video.edit');
      Route::post('/update', 'VideoController@update')->name('admin.video.update');
      Route::post('/update/in-home', 'VideoController@inHome')->name('admin.video.in.home');
   });

   Route::group(['prefix' => 'shows'], function (){
      Route::get('/', 'ShowController@index')->name('admin.show.index');
      Route::get('/add-show', 'ShowController@create')->name('admin.show.create');
      Route::post('/story-show', 'ShowController@storyShow')->name('admin.show.story');
      Route::get('/edit-show/{id}', 'ShowController@editShow')->name('admin.show.edit');
      Route::post('/update-show', 'ShowController@updateShow')->name('admin.show.update');
      Route::get('/delete-show/{id}', 'ShowController@deleteShow')->name('admin.show.delete');
      Route::get('/seasons', 'ShowController@seasons')->name('admin.show.season.index');
      Route::get('/add-season', 'ShowController@createSeasons')->name('admin.show.season.create');
      Route::post('/story-season', 'ShowController@storySeasons')->name('admin.show.season.story');
      Route::get('/edit-season/{id}', 'ShowController@editSeasons')->name('admin.show.season.edit');
      Route::post('/update-season', 'ShowController@updateSeasons')->name('admin.show.season.update');
      Route::get('/delete-season/{id}', 'ShowController@deleteSeasons')->name('admin.show.season.delete');
   });

   Route::group(['prefix' => 'audio'], function (){
       Route::get('/', 'AudioController@index')->name('admin.audio.index');
       Route::get('/add-audio', 'AudioController@create')->name('admin.audio.create');
       Route::post('/upload-audio', 'AudioController@uploadVideo')->name('admin.audio.upload.audio');
       Route::post('/story', 'AudioController@story')->name('admin.audio.story');
       Route::get('/delete/{id}', 'AudioController@delete')->name('admin.audio.delete');
       Route::get('/edit/{id}', 'AudioController@edit')->name('admin.audio.edit');
       Route::post('/update', 'AudioController@update')->name('admin.audio.update');
   });

   Route::group(['prefix' => 'documents'], function (){
       Route::get('/', 'DocumentController@index')->name('admin.document.index');
       Route::get('/add-document', 'DocumentController@create')->name('admin.document.create');
       Route::post('/upload-document', 'DocumentController@uploadVideo')->name('admin.document.upload.document');
       Route::post('/story', 'DocumentController@story')->name('admin.document.story');
       Route::get('/delete/{id}', 'DocumentController@delete')->name('admin.document.delete');
       Route::get('/edit/{id}', 'DocumentController@edit')->name('admin.document.edit');
       Route::post('/update', 'DocumentController@update')->name('admin.document.update');
   });

});
