<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Get Home view
Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard',function(){
    return view('dashboard');
});

// Resource routes for contact
Route::resource('/contact', 'ContactController');
Route::post('/contact/response','ContactController@sendResponse');

// Resource routes for appointment
Route::resource('/appointment','AppointmentController');

// Search
Route::get('/search/{date}','AppointmentController@search');

// Manage any route
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?');
