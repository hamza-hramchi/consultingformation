<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Get Home view
Route::get('/', 'HomeController@index')->name('home');

// Resource routes for contact
Route::resource('/contact', 'ContactController');

// Resource routes for appointment
Route::resource('/appointment','AppointmentController');

// Manage any route
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?');
