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

Route::get('/', function () {
    return view('Index');
});
Route::get('Index', 'MainController@Index')->name('Index');
Route::get('Login', 'MainController@Login')->name('Login');
Route::get('Register', 'MainController@Register')->name('Register');
Route::get('AboutUs', 'MainController@AboutUs')->name('AboutUs');

Route::get('Links', 'CaptureController@GetSource')->name('Links');
Route::get('Download/{id}', 'CaptureController@DownloadSource')->name('Download');
Route::delete('Delete/{id}', 'CaptureController@DeleteSource')->name('Delete');
Route::post('Capture', 'CaptureController@CaptureContent')->name('Capture');
Route::post('Save', 'CaptureController@SaveSource')->name('Save');

Route::get('Create', 'TemplateController@create')->name('Create');
Route::post('SaveT', 'TemplateController@store')->name('SaveT');
Route::get('TSource', 'TemplateController@show')->name('TSource');
Route::get('DownloadTS/{id}', 'TemplateController@DownloadSource')->name('DownloadTS');
Route::delete('DeleteTS/{id}', 'TemplateController@DeleteSource')->name('DeleteTS');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('doneP', 'PaymentController@paymentComplete')->name('donePayment');
Route::get('cancelP', 'PaymentController@paymentCancel')->name('cancelPayment');
Route::post('IPN', 'PaymentController@IPN')->name('IPN');

Auth::routes();
