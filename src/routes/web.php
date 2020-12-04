<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FundamentalPatternsController;
use App\Http\Controllers\CreationalPatternsController;
use App\Http\Controllers\BehavioralPatternsController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'fundamentals', 'as' => 'fundamentals.'], function() {
    Route::get('property-container', [FundamentalPatternsController::class, 'PropertyContainer'])->name('propertyContainer');
    Route::get('delegation', [FundamentalPatternsController::class, 'Delegation'])->name('delegation');
    Route::get('event-channel', [FundamentalPatternsController::class, 'EventChannel'])->name('eventChannel');
    Route::get('interface', [FundamentalPatternsController::class, 'Interface'])->name('interface');
});

Route::group(['prefix' => 'creational', 'as' => 'creational.'], function() {
    Route::get('abstract-factory', [CreationalPatternsController::class, 'AbstractFactory'])->name('abstractFactory');
    Route::get('builder', [CreationalPatternsController::class, 'Builder'])->name('builder');
    Route::get('factory-method', [CreationalPatternsController::class, 'FactoryMethod'])->name('factoryMethod');
    Route::get('lazy-initialization', [CreationalPatternsController::class, 'LazyInitialization'])->name('lazyInitialization');
    Route::get('multiton', [CreationalPatternsController::class, 'Multiton'])->name('multiton');
    Route::get('static-factory', [CreationalPatternsController::class, 'StaticFactory'])->name('staticFactory');
    Route::get('simple-factory', [CreationalPatternsController::class, 'SimpleFactory'])->name('simpleFactory');
    Route::get('singleton', [CreationalPatternsController::class, 'Singleton'])->name('singleton');
    Route::get('prototype', [CreationalPatternsController::class, 'Prototype'])->name('prototype');
});
Route::group(['prefix' => 'behavioral', 'as' => 'behavioral.'], function() {
    Route::get('strategy', [BehavioralPatternsController::class, 'Strategy'])->name('strategy');
});
