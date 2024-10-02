<?php

namespace twitesoft\Contact\Http\Controllers;

use twitesoft\Contact\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use twitesoft\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
     
    public function index()
    {
       return view('contact::index');
    }

    public function store(Request $request)
    {
      Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->name,$request->description));

      Contact::create($request->all());

      return redirect()->back();
   }

}
