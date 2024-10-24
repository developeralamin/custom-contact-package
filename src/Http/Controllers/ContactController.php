<?php

namespace twitesoft\Contact\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use twitesoft\Contact\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use twitesoft\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use twitesoft\Contact\Notifications\ContactNotification;
class ContactController extends Controller
{
     
    public function index()
    {
       return view('contact::index');
    }

    public function store(Request $request)
    {
      Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->name,$request->description));

      $contact = Contact::create($request->all());

      $contact->notify(new ContactNotification($contact));

      return redirect()->back();
   }

}
