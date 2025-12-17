<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail; // import Mail facade
use App\Mail\ContactMail;            // import your mailable

class ContactController extends Controller
{
    // public function submit(Request $request)
    // {
    //     // Validate form inputs
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     // Send email
    //     Mail::to('support@arkargo.com')->send(new ContactMail($request->all()));

    //     // Redirect back with success message
    //     return back()->with('success', 'Your message has been sent successfully.');
    // }



    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->all();

        // Send email to admin
        Mail::to('support@arkargo.org')->send(new ContactMail($data));

        // Send confirmation email to user
        Mail::to($data['email'])->send(new ContactMail($data, true));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}


