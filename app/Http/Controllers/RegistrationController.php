<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function showRegisteredEvents($id)
    {
        $user = User::with('registrations.event')->find($id);

        $registeredEvents = $user->registrations->pluck('event');

        return view('registeredEvents', compact('registeredEvents'));
    }

    public function unregister(Event $event)
    {
        $user = auth()->user();

        // Find the registration record for the user and the event
        $registration = Registration::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($registration) {
            // Remove the registration record
            $registration->delete();

            return redirect()->back()->with('success', 'Successfully unregistered from the course.');
        } else {
            return redirect()->back()->with('error', 'error.');
        }
    }
}
