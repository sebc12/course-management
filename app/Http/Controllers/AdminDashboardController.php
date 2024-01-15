<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $events = Event::withCount('registrations')->get();
        return view('admin.adminDashboard', ['events' => $events]);
        return view('admin.adminDashboard');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'location' => 'required|string',
                'capacity' => 'required|integer',
                'price' => 'required|numeric',
                'Description' => 'nullable|string',
            ]);

            Event::create([
                'name' => $request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'location' => $request->location,
                'capacity' => $request->capacity,
                'price' => $request->price,
                'Description' => $request->Description,

            ]);

            return redirect()->back()->with('success', 'Event saved successfully!');
        } catch (\Exception $e) {

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while saving the event.');
        }
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.adminEditCourse', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validate the form data as needed
        $request->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required|string',
            'capacity' => 'required|integer',
            'price' => 'required|numeric',
            'Description' => 'nullable|string',

        ]);

        $event->update($request->all());

        return redirect('/admin-dashboard');
    }
}
