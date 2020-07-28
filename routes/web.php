<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Get Home view
Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard',function(){
    return view('dashboard');
});

// Resource routes for contact
Route::resource('/contact', 'ContactController');

/*Route::get('/sendMail',function(){
    $data = [
        'email' => 'test@user.fr',
        'message' => 'Mon message de confirmation'
    ];
    Mail::to('hramchi.hamza@gmail.com')->send(new App\Mail\MailCF($data));
    echo "Email envoyé";
});*/

// Resource routes for appointment
Route::resource('/appointment','AppointmentController');

// Manage any route
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?');
