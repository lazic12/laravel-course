<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(){

        $data = request()->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

//        dd(request()->all());
        //Send an Email

        Mail::to('test@test.com')->send(new ContactFormMail($data));

//        вторая версия выражения снизу с with
//       session()->flash('message', 'Thank you for your message. We\'ll be in touch');

        return redirect('/contact-us')->with('message', 'Thank you for your message. We\'ll be in touch');
    }
}
