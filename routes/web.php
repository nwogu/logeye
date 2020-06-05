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

AwesAuth::routes();

# Admin part
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('logs.index', request()->all());
    });

    # Logs
    Route::prefix('logs')->as('logs.')->namespace('\App\Sections\Log\Controllers')->group(function () {
        Route::get('/', 'LogController@index')->name('index');
        Route::get('scope', 'LogController@scope')->name('scope');
        Route::get('{id}', 'LogController@show')->name('show');
    });

     # Logs
     Route::prefix('refresh')->as('logs.')->namespace('\App\Sections\Log\Controllers')->group(function () {
        Route::post('/', 'LogController@refresh')->name('refresh');
    });

    # Sites
    Route::prefix('sites')->as('sites.')->namespace('\App\Sections\Site\Controllers')->group(function () {
        Route::get('/', 'SiteController@index')->name('index');
        Route::get('scope', 'SiteController@scope')->name('scope');
        Route::get('{id}', 'SiteController@show')->name('show');
        Route::post('/', 'SiteController@store')->name('store');
        Route::patch('{id}', 'SiteController@update')->name('update');
    });

    // Settings
    Route::prefix('settings')->as('settings.')->namespace('\App\Sections\Settings\Controllers')->group(function () {
        Route::get('/', 'SettingController@index')->name('index');
        Route::post('update', 'SettingController@update')->name('update');
        Route::post('password', 'SettingController@password')->name('password');
        Route::post('refresh-api-token', 'SettingController@refreshApiToken')->name('refresh.api.token');
    });

});

