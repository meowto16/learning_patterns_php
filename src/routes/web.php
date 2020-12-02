<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'fundamentals'], function() {
    Route::get('property-container', 'FundamentalPatternsController@PropertyContainer');
    Route::get('delegation', 'FundamentalPatternsController@Delegation');
    Route::get('event-channel', 'FundamentalPatternsController@EventChannel');
    Route::get('interface', 'FundamentalPatternsController@Interface');
});

Route::group(['prefix' => 'creational'], function() {
    Route::get('abstract-factory', 'CreationalPatternsController@AbstractFactory');
    Route::get('factory-method', 'CreationalPatternsController@FactoryMethod');
    Route::get('static-factory', 'CreationalPatternsController@StaticFactory');
    Route::get('simple-factory', 'CreationalPatternsController@SimpleFactory');
    Route::get('singleton', 'CreationalPatternsController@Singleton');
});
Route::group(['prefix' => 'behavioral'], function() {
    Route::get('strategy', 'BehavioralPatternsController@Strategy');
});
