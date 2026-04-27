<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{   
    /*send an update to all members of a specific club. */
    public function sendUpdate(Request $request, $id)
    {
        // 1. Find the club
        $club = Club::findOrFail($id);

        // 2. The message from your form
        $messageContent = $request->input('message'); 

        // 3. Get all members of THIS club
        $members = $club->members; 

        // 4. Send the notification to each member
        foreach ($members as $member) {
            $member->notify(new ClubNotification($club, $messageContent));
        }

        return back()->with('status', 'Notification sent to ' . $members->count() . ' members!');
    }
}
