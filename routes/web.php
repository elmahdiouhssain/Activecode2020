<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\User;
use App\activation;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/connection_error','Seller\DashboardController@ErrorConnection')->name('seller.error');

Route::get('/request_account','IndexController@insert')->name('seller.newseller');
Route::post('/request_account','IndexController@create')->name('seller.newseller');


/////////////////////////Start Administrator Track/////////////////////////////

Route::get('/admin_dashboard', 'Admin\DashboardController@index')->middleware('role:admin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});

/////////////////////////End Administrator Track//////////////////////////////


/////////////////////////Start Sellers Track//////////////////////////////////
Route::get('/seller_dashboard', 'Seller\DashboardController@index')->middleware('role:seller');



Route::get('/newline/', 'Seller\DashboardController@CreateFormApi')->name('seller.newline')->middleware('role:seller');
Route::post('/newline/', 'Seller\DashboardController@SendFormApi')->name('seller.mylines')->middleware('role:seller');

Route::get('/mylines/', 'Seller\DashboardController@Mylines')->name('seller.mylines')->middleware('role:seller');

//Route::get('/lines/{{$fullname}}','Seller\DashboardController@getCodesByReseller')->name('seller.lines')->middleware('role:seller');
//Route::post('/lines/{{$fullname}}','Seller\DashboardController@getCodesByReseller')->name('seller.lines')->middleware('role:seller');

Route::get('/lines/{id}','Seller\DashboardController@getCodesByReseller');
Route::post('/lines/{{$id}}','Seller\DashboardController@getCodesByReseller');

Route::post('/lines/disable/{id}', 'Seller\DashboardController@disableActivation')->name('lines.disable');
Route::get('/lines/disable/{id}', 'Seller\DashboardController@disableActivation')->name('lines.disable');



Route::get('/log', 'Seller\DashboardController@Log')->middleware('role:seller');

Route::get('/api', 'Seller\DashboardController@Api')->name('seller.api')->middleware('role:seller');
Route::post('/api/update/{{$id}}', 'Seller\DashboardController@Apiupdate')->name('seller.apiupdate')->middleware('role:seller');

Route::get('/profile', 'Seller\DashboardController@Profile')->middleware('role:seller');
Route::post('/profile/update', 'Seller\DashboardController@EditProfile')->middleware('role:seller');


Route::get('new_ticket', 'TicketsController@create')->name('seller.newticket')->middleware('role:seller');
Route::post('new_ticket', 'TicketsController@store')->middleware('role:seller');
Route::get('/tickets', 'TicketsController@userTickets')->middleware('role:seller');
Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::post('comment', 'CommentsController@postComment');

/////////////////////////End Sellers Track///////////////////////////////////





Route::get('/home', 'HomeController@index')->name('home');
////////////////////////////////Auth Route/////////////////////////////////////
/* Authentication Routes... */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  
/* Registration Routes... */
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
 
/* Password Reset Routes... */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
  
/* Email Verification Routes... */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');





