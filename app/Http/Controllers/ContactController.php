<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(){
        //
    }


    public function store(ContactRequest $request){
        return Contact::create($request->all());
    }

    
    public function show(ContactRequest $contact){
        //
    }

   
    public function edit(ContactRequest $contact){
        //
    }

    
    public function update(ContactRequest $request, Contact $contact){
        //
    }

    
    public function destroy(Contact $contact){
        //
    }
}
