<?php
/**
 * Created by PhpStorm.
 * User: professor
 * Date: 09.02.2019
 * Time: 23:11
 */

use App\Core\Route;

Route::get('/start', 'MainController@index');

Route::get('/signin', 'MainController@signin');
Route::post('/signin', 'MainController@postSignin');

Route::get('/signup', 'MainController@signup');

Route::get('/signout', 'MainController@signout');

Route::get('/([0-9]+)', 'MainController@home');

Route::pathNotFound(function () {
    return view('404', ['code' => '404']);
});

Route::methodNotAllowed(function () {
    return view('404', ['code' => '403']);
});
