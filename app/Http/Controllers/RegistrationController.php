<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /*public function register(Event $event, Request $request)
    {
        // Validate the form data
        $request->validate([
            'participant_name' => 'required|string|max:255',
            'participant_email' => 'required|email|max:255',
        ]);

        // Create a new registration record
        $registration = new Registration([
            'event_id' => $event->id,
            'participant_name' => $request->input('participant_name'),
            'participant_email' => $request->input('participant_email'),
        ]);

        $registration->save();

        // You can add a success message or redirect the user to a confirmation page
        return redirect()->route('home')->with('success', 'Registration successful!');
    }*/
}
