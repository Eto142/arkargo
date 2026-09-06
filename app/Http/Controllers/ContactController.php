<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail; // import Mail facade
use Illuminate\Support\Facades\Log;
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

        // Honeypot: simple anti-bot field (must be empty)
        if ($request->filled('website')) {
            // silently ignore bot submissions
            return back()->with('success', 'Your message has been sent successfully.');
        }

        $data = $request->only(['name', 'email', 'subject', 'message']);

        // Prevent very quick duplicate submissions from the same session
        $signature = sha1($data['name'] . '|' . $data['email'] . '|' . $data['subject'] . '|' . $data['message']);
        $lastSignature = $request->session()->get('contact_last_signature');
        $lastTime = $request->session()->get('contact_last_time');
        if ($lastSignature && $lastSignature === $signature && $lastTime && time() - $lastTime < 60) {
            // Treat as already submitted; do not resend
            return back()->with('success', 'Your message has been sent successfully.');
        }

        // store signature and time
        $request->session()->put('contact_last_signature', $signature);
        $request->session()->put('contact_last_time', time());

        try {
            // Send email to admin
            Mail::to('support@arkargo.org')->send(new ContactMail($data));

            // Send confirmation email to user (keep UI/functionality intact)
            Mail::to($data['email'])->send(new ContactMail($data, true));

            return back()->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            // Log the error for diagnostics, but do not cause repeated exceptions
            Log::error('Contact form mail send failed', ['error' => $e->getMessage()]);

            return back()->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}


