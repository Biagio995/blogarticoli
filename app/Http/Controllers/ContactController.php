<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactEmail(Request $request) {
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_phone' => 'required',
            'user_message' => 'required'
        ]);
        // dd($request->all());
    


        $mail = new ContactMail($request->user_name, $request->user_email, $request->user_phone, $request->user_message);
        Mail::to('noreply@bobbylarva.com')->send($mail);

        return redirect()->back()->with('success', 'Email inviata con successo!');
}
}
