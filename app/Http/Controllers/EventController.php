<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function getAllEvents()
    {
        $events = Event::all();

        return view('home', ['events' => $events]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('showEvent', ['event' => $event]);
    }

    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Check if the user is registered for the event
        $existingRegistration = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        // Check if the event has reached its capacity
        if ($event->registrations()->count() >= $event->capacity) {
            return redirect()->back()->with('error', 'This event has reached its capacity.');
        }

        // Create a new registration for the authenticated user
        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
        ]);

        return redirect()->back()->with('success', 'Registration successful!');
    }
}
