<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('portfolios/destroy', 'PortfolioController@massDestroy')->name('portfolios.massDestroy');

    Route::resource('portfolios', 'PortfolioController');

    Route::post('portfolios/media', 'PortfolioController@storeMedia')->name('portfolios.storeMedia');

    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');

    Route::resource('clients', 'ClientsController');

    Route::post('clients/media', 'ClientsController@storeMedia')->name('clients.storeMedia');

    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');

    Route::resource('staff', 'StaffController');

    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');

    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');

    Route::resource('services', 'ServicesController');

    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');

    Route::delete('contact-infos/destroy', 'ContactInfoController@massDestroy')->name('contact-infos.massDestroy');

    Route::resource('contact-infos', 'ContactInfoController');
});
