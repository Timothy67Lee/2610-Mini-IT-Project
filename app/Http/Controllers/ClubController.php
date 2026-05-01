<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Notifications\ClubNotification;

class ClubController extends Controller
{   
    /*send an update to all members of a specific club. */
    public function sendUpdate(Request $request, $id)
    {
        // Find the club
        $club = Club::findOrFail($id);

        // The message from your form
        $messageContent = $request->input('message'); 

        // Get all members of THIS club
        $members = $club->members; 

        // Send the notification to each member
        foreach ($members as $member) {
            $member->notify(new ClubNotification($club, $messageContent));
        }

        return back()->with('status', 'Notification sent to ' . $members->count() . ' members!');
    }
}
