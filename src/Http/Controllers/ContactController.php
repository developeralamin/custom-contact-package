<?php

namespace Twitesoft\Contact\Http\Controllers;

use Twitesoft\Contact\Models\Contact;
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
