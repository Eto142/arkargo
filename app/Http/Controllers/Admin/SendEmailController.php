<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // ✅ Import base Controller
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSendMail;
use App\Models\SentEmail;

class SendEmailController extends Controller
{
    public function index()
    {
        $sentEmails = SentEmail::latest()->get();

        return view('admin.send_email', compact('sentEmails')); // Blade file: resources/views/admin/send_email.blade.php
    }

    public function send(Request $request)
    {
        $request->validate([
            'to'         => 'required|email',
            'subject'    => 'required|string|max:255',
            'message'    => 'required|string',
            'attachment' => 'nullable|file|max:10240',
        ]);

        try {
            $attachmentPath = null;
            $storedPath = null;

            if ($request->hasFile('attachment')) {
                $storedPath = $request->file('attachment')->store('email-attachments', 'public');
                $attachmentPath = storage_path('app/public/' . $storedPath);
            }

            Mail::to($request->to)->send(new AdminSendMail(
                $request->subject,
                $request->message,
                $attachmentPath
            ));

            SentEmail::create($request->only('to', 'subject', 'message') + [
                'attachment' => $storedPath,
            ]);

            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
