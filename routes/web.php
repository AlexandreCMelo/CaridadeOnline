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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route



Route::resource('organizations', 'OrganizationController', [
  'names' => [
    'store' => 'organization.store',
    'index' => 'organization.list',
    'destroy' => 'organization.destroy',
  ]
]);

Route::resource('users', 'UserController', [
  'names' => [
    'index' => 'user.list'
  ]
]);

// Authentication Routes
Auth::routes();

// Messages
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

// Public Routes
Route::group(['middleware' => 'web'], function () {
    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/',
        [
            'as' => 'home',
            'uses' => 'HomeController@home'
        ]
    );

    // Activation Routes
    Route::get('/activate',
        [
            'as' => 'activate',
            'uses' => 'Auth\ActivateController@initial'
        ]
    );
    Route::get('/activate/{token}',
        [
            'as' => 'authenticated.activate',
            'uses' => 'Auth\ActivateController@activate'
        ]
    );
    Route::get('/activation',
        [
            'as' => 'authenticated.activation-resend',
            'uses' => 'Auth\ActivateController@resend'
        ]
    );
    Route::get('/exceeded',
        [
            'as' => 'exceeded',
            'uses' => 'Auth\ActivateController@exceeded'
        ]
    );
    Route::get('/re-activate/{token}',
        [
            'as' => 'user.reactivate',
            'uses' => 'RestoreUserController@userReActivate'
        ]
    );

    Route::get('charis/login', 'Auth\CharisLoginController@login')->name('charislogin');

    // Socialite Register Routes
    // Route::get('/social/redirect/{provider}',
    //     [
    //         'as' => 'social.redirect',
    //         'uses' => 'Auth\SocialController@getSocialRedirect'
    //     ]
    // );
    // Route::get('/social/handle/{provider}',
    //     [
    //         'as' => 'social.handle',
    //         'uses' => 'Auth\SocialController@getSocialHandle'
    //     ]
    // );


    // Login social
    Route::group(['prefix' => 'login'], function() {
        Route::get('{provider}', '\Charis\SocialLogin\SocialLogin@getPermission')->name('social.login');
        Route::get('{provider}/callback', '\Charis\SocialLogin\SocialLogin@callback')->name('social.callback');
    });

});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {

    // Activation Routes
    Route::get('/activation-required',
        [
            'uses' => 'Auth\ActivateController@activationRequired'
        ])->name('activation-required');


    Route::get('/logout',
        [
            'uses' => 'Auth\LoginController@logout'
        ])->name('logout');

    Route::get('/dashboard',
        [
            'as' => 'dashboard',
            'uses' => 'HomeController@index'
        ]);

    Route::get('/dashboard/upload',
        [
            'as' => 'dashboard.upload',
            'uses' => 'HomeController@upload'
        ]);

    Route::post('/dashboard/upload/create',
        [
            'as' => 'dashboard.upload.create',
            'uses' => 'HomeController@uploadCreate'
        ]);


});
