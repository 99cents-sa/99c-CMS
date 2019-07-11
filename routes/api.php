<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('portfolios', 'PortfolioApiController');

    Route::apiResource('clients', 'ClientsApiController');

    Route::apiResource('staff', 'StaffApiController');

    Route::apiResource('services', 'ServicesApiController');

    Route::apiResource('contact-infos', 'ContactInfoApiController');
});
