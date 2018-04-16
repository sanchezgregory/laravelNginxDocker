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

Route::group(['middleware' => ['web']], function() {

    Route::get('/', function () {

        return view('welcome');
    });

    // Auth::routes();  // Estas son las que Auth::routes() trae por defecto -----------------------
    // ubicada en Illuminate\Routing\Router\Auth()

    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->get('confirmation/{token}', 'Auth\RegisterController@getConfirmation')->name('confirmation');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');


    Route::group(['middleware'=> ['auth']], function() {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/users', 'UserController@index')->name('users.index');
        Route::get('/users/{user}/show', 'UserController@show')->name('users.show');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::put('/users/{user}', 'UserController@update')->name('users.update');
        Route::post('/users/{user}/profile', 'ProfileController@store')->name('profiles.store');
        Route::put('/users/{user}/profile', 'ProfileController@update')->name('profiles.update');
        Route::get('/users/{user}/profile/delete', 'ProfileController@delete')->name('profiles.delete');

        Route::group(['middleware' => ['role:admin']], function() {

            // Usuarios
            Route::get('/users/create', 'UserController@create')->name('users.create');
            Route::post('/users/', 'UserController@store')->name('users.store');
            Route::get('/users/{user}/delete', 'UserController@delete')->name('users.delete');
            Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

            // Roles
            Route::get('/roles', 'RoleController@index')->name('roles.index');
        });

    });

});