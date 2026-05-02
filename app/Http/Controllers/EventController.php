<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Club;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(Club $club)
    {
        return view('events.create', compact('club'));
    }

    public function store(Request $request, Club $club)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date'  => 'required|date',
            'time'  => 'required',
        ]);

        $event = new Event($validated);
        $event->club_id = $club->id;
        $event->save();

        return redirect()->route('clubs.show', $club->id)
                         ->with('success', 'Event created successfully!');
    }

    // NEW: show edit form
    public function edit(Club $club, Event $event)
    {
        return view('events.edit', compact('club', 'event'));
    }

    // NEW: handle update
    public function update(Request $request, Club $club, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date'  => 'required|date',
            'time'  => 'required',
        ]);

        $event->update($validated);

        return redirect()->route('clubs.show', $club->id)
                         ->with('success', 'Event updated successfully!');
    }

    // NEW: handle delete
    public function destroy(Club $club, Event $event)
    {
        $event->delete();

        return redirect()->route('clubs.show', $club->id)
                         ->with('success', 'Event deleted successfully!');
    }
}

