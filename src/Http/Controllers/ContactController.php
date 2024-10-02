<?php

namespace TwiteSoft\Contact\Http\Controllers;

use TwiteSoft\Contact\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
     
    public function index()
    {
       return view('contact::index');
    }

    public function store(Request $request)
    {
         Contact::create($request->all());

         return redirect()->back();
   }

}
