<?php

use Illuminate\Http\Request;
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
   Route::get('/show/{slug}', 'GeneralController@showDetails')->name('show.details');
   Route::get('/page/{slug}', 'GeneralController@showPage')->name('show.page');
   Route::get('/category/{slug}', 'GeneralController@showCategory')->name('show.category');
   Route::group(['middleware' => 'auth:web'], function (){
       Route::group(['middleware' => ['role:user']], function (){
           Route::get('/add-favorites/{id}', 'GeneralController@addFavorites')->name('add.favorites');
           Route::post('/add-comment', 'GeneralController@addComment')->name('add.comment');
           Route::get('/watch-show/{slug}/{videoId?}', 'GeneralController@watchShow')->name('watch.show');
           Route::get('/watch-video/{slug}', 'GeneralController@watchVideo')->name('watch.video');
       });
       Route::get('/user/logout', 'GeneralController@logout')->name('logout');
       Route::get('/user/manage-profile', 'GeneralController@manage')->name('manage.profile');
       Route::post('/user/manage-profile/{id}', 'GeneralController@updateManage')->name('manage.profile.update');
       Route::get('/user/setting-profile', 'GeneralController@settingProfile')->name('manage.profile.setting');
       Route::get('/{id}/checkout/{name?}', 'GeneralController@checkout')->name('checkout');
       Route::get('/subscription/{planId?}/{subscriptionId?}/{billingToken?}/{orderID?}', 'PaymentController@subscription')->name('create-agreement');
   });
});

//Route::get('stripe', function (){
//    return view('stripe');
//});
//Route::post('/subscribe', function (Request $request){
//    $token = $request->stripeToken;
//    auth()->user()->newSubscription('main','monthly')->withCoupon($request->coupon)->create($token);
//    auth()->user()->assignRole('subscriber');
//    return redirect('/');
//});
