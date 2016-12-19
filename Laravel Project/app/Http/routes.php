<?php
Route::get('/', 'HomeController@index')->name('front_end');

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {

    Route::group(['middleware'=>'auth'],function(){
        Route::get('/', 'AdminController@index');
        Route::get('/dashboard', 'AdminController@index')->name('dash');


        Route::group(['prefix' => 'user','middleware'=>'roles'], function () {
            Route::get('/', 'UserController@index')->name('users');
            Route::get('add', 'UserController@add')->name('add_user');
            Route::post('add','UserController@addAction');

            Route::get('delete/{id?}','UserController@deleteAction')->name('delete-user');
            Route::get('update/{id?}','UserController@updateAction')->name('update-user');

            Route::post('update','UserController@update')->name('update-submit');
        });

        Route::get('send-mail','MailController@redirectMail')->name('send-mail');
        Route::post('send-mail','MailController@sendMail')->name('send-mail');

    });

    Route::post('status','UserController@changeUserStatus');

    Route::get('login','AdminController@redirectLogin')->name('login');
    Route::post('login','AdminController@Login');

    Route::get('logout','AdminController@logout')->name('logout');



});

Route::group(['prefix'=>'user','namespace'=>'User'],function(){
    Route::get('add_category','GalleryController@addCatAction')->name('add_category');
    Route::post('add_category','GalleryController@addCategory');
});