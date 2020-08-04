<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Mail\MailCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    
    public function index(){
        return Contact::where('response', '=', 0)->get();
    }


    public function store(ContactRequest $request){
        Contact::create($request->all());
        $data = [
            'name' => $request->name,
            'message' => "Merci de nous avoir contacté. Nous allons vous répondre dans les meilleurs délais."
        ];
        return Mail::to($request->email)->send(new MailCF($data));
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

    public function sendResponse(Request $request){
        $data = [
            'name' => $request->name,
            'message' => $request->reponse
        ];
        Mail::to($request->email)->send(new MailCF($data));
        $contact = Contact::findOrFail($request->id);
        $contact->response = 1;
        $contact->save();
        
    }
}
