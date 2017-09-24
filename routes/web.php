<?php

#System Modules
const MODULE_DASHBOARD = 'Dashboard\\';
const MODULE_USER = 'Dashboard\\';
const MODULE_ADMIN = 'Admin\\';
const MODULE_AUTH = 'Auth\\';

#system controllers
const HOME_CONTROLLER = 'Home';
const ACTIVATE_CONTROLLER = 'Activate';

#system actions
const ACTION = 'Controller@';
const INDEX = 'index';
const INITIAL_ACTIVATION = 'initial';

#system urls
const HOME_URL = '/';
const WITH_PARAM = '/';
const ACTIVATE_ACCOUNT_URL = '/activate';

//Home Route
Route::get(HOME_URL,
    MODULE_DASHBOARD .
    HOME_CONTROLLER .
    ACTION .
    INDEX
)->name('home');

// Public Routes
Route::group(['middleware' => 'web'], function () {

    // Activation Routes
    Route::get(ACTIVATE_ACCOUNT_URL,
        [
            'as' => 'activate',
            'uses' =>
                MODULE_ADMIN .
                ACTIVATE_CONTROLLER .
                ACTION .
                INITIAL_ACTIVATION
        ]
    );

    Route::get(
        ACTIVATE_ACCOUNT_URL.WITH_PARAM.
        '{token}',
        ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);

});


/**
 * Admin routes
 */
Route::resource('user', 'UserController');

Auth::routes();


