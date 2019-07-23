<?php
    /**
     * Back up
     *
     *  Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
     *  Route::apiResource('permissions', 'PermissionsApiController');

     *  Route::apiResource('roles', 'RolesApiController');

      *  Route::apiResource('users', 'UsersApiController');

     *  Route::apiResource('portfolios', 'PortfolioApiController');

     *  Route::apiResource('clients', 'ClientsApiController');

     *  Route::apiResource('staff', 'StaffApiController');

     *  Route::apiResource('services', 'ServicesApiController');

 
     *  });
     * */
    Route::resource('contact-infos', 'ContactInfoController',
    ['only' => ['index', 'show']]);

    Route::resource('portfolios', 'PortfolioController',
    ['only' => ['index', 'show']]);

    Route::resource('clients', 'ClientController',
    ['only' => ['index', 'show']]);

    Route::resource('staff', 'StaffController',
    ['only' => ['index', 'show']]);

    Route::resource('services', 'ServiceController',
    ['only' => ['index', 'show']]);


//Route::get('contact-infos', 'ArticleController@index');


