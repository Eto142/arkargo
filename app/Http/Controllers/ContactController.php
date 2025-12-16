<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //


public function submit(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    // Mail::to('support@arkargo.com')->send(new ContactMail($request->all()));

    return back()->with('success', 'Your message has been sent successfully.');
}

}
