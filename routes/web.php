<?php

use App\Mail\SigUp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Frontend\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // Auth
    Route::name('auth.')->middleware('guest:web')->group(function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('login', 'AuthController@postLogin')->name('postLogin');
        Route::get('register', 'AuthController@register')->name('register');
        Route::post('register', 'AuthController@postRegister')->name('postRegister');
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('events', [HomeController::class, 'events'])->name('events');
    Route::get('events/{id}', [HomeController::class, 'event'])->name('event');
    Route::post('showIframe', [HomeController::class, 'showIframe'])->name('showIframe')->middleware('auth:web');

    Route::middleware('auth:web')->group(function () {
        // Payments
        Route::get('callback', [PaymentController::class, 'callback'])->name('callback');
        Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
    });

    Route::get('/send', function () {
        Mail::to('hamo01099389305@gmail.com')->send(new sigup());
        return response('sending');
    });
    // Route::get('/mail', [EmailController::class, 'sendMail']);
});

Route::get('reset', function () {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Done";
});

Route::get('ticket', function () {
    return view('emails.sendTicketMail');
});
