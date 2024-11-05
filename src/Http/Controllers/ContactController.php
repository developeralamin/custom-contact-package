<?php

namespace twitesoft\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use twitesoft\Contact\Jobs\ProcessContact;

class ContactController extends Controller
{
     
    public function index()
    {
       return view('contact::index');
    }

    public function store(Request $request)
    {
      $data = $request->all();
      ProcessContact::dispatch($data);

      return redirect()->back();
   }

}
