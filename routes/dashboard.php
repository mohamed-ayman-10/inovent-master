<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "dashboard" middleware group. Now create something great!
|
*/

// Auth
Route::controller(AuthController::class)->middleware('guest:admin')->name('auth.')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'postLogin')->name('postLogin');
});
Route::get('logout', 'AuthController@logout')->name('auth.logout')->middleware('auth:admin');

Route::middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('dashboard.index');
    });

    // Events
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', 'EventController@index')->name('index');
        Route::get('/create', 'EventController@create')->name('create');
        Route::post('/store', 'EventController@store')->name('store');
        Route::get('{id}/destroy', 'EventController@destroy')->name('destroy');
        Route::get('{id}/edit', 'EventController@edit')->name('edit');
        Route::post('{id}/update', 'EventController@update')->name('update');
    });

    // Tickets
    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/{event_id}', 'TicketController@index')->name('index');
        Route::get('{event_id}/create', 'TicketController@create')->name('create');
        Route::post('/store', 'TicketController@store')->name('store');
        Route::get('{id}/destroy', 'TicketController@destroy')->name('destroy');
        Route::get('{id}/edit', 'TicketController@edit')->name('edit');
        Route::post('{id}/update', 'TicketController@update')->name('update');
    });

    // Speakers
    Route::resource('speakers', 'SpeakerController');

    // Axhibitors
    Route::resource('exhibitor', 'AxhibitorController');
    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('', 'UserController@index')->name('index');
        Route::get('{id}/edit', 'UserController@edit')->name('edit');
        Route::post('{id}/update', 'UserController@update')->name('update');
        Route::get('{id}/destroy', 'UserController@destroy')->name('destroy');
    });

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', 'ProfileController@index')->name('index');
        Route::post('postEdit', 'ProfileController@postEdit')->name('postEdit');
    });
});
