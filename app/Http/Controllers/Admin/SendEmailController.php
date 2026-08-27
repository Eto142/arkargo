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
        return view('admin.send_email'); // Blade file: resources/views/admin/send_email.blade.php
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
            $attachmentName = null;
            $attachmentMime = null;
            $attachmentData = null;

            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $attachmentName = $file->getClientOriginalName();
                $attachmentMime = $file->getMimeType();
                $attachmentData = file_get_contents($file->getRealPath());
            }

            Mail::to($request->to)->send(new AdminSendMail(
                $request->subject,
                $request->message,
                $attachmentName,
                $attachmentMime,
                $attachmentData
            ));

            SentEmail::create($request->only('to', 'subject', 'message') + [
                'attachment_name' => $attachmentName,
                'attachment_mime' => $attachmentMime,
                'attachment_data' => $attachmentData !== null ? base64_encode($attachmentData) : null,
            ]);

            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function history()
    {
        $sentEmails = SentEmail::latest()->get();

        return view('admin.sent_emails', compact('sentEmails'));
    }

    public function attachment(SentEmail $sentEmail)
    {
        abort_unless($sentEmail->hasAttachment(), 404);

        return response(base64_decode($sentEmail->attachment_data))
            ->header('Content-Type', $sentEmail->attachment_mime ?: 'application/octet-stream')
            ->header('Content-Disposition', 'inline; filename="' . $sentEmail->attachment_name . '"');
    }

    public function destroy(SentEmail $sentEmail)
    {
        $sentEmail->delete();

        return back()->with('success', 'Sent email deleted.');
    }

    public function clear()
    {
        SentEmail::query()->delete();

        return back()->with('success', 'Sent email history cleared.');
    }
}
