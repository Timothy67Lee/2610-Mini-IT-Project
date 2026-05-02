<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Notifications\ClubNotification;

class ClubController extends Controller
{   


 public function store(Request $request)
    {



        // AUTHORIZATION
        // Checks if the logged-in user is a committee member of THIS specific club
        if (!$club->members()->where('user_id', auth()->id())->where('role', 'committee')->exists()) {
            abort(403, 'Unauthorized: Only committee members can post updates.');
        }

        // Create the Post
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'club_id' => $club->id,
            'user_id' => auth()->id(),
        ]);

        // NOTIFICATION
        // Fetch only members of this club to notify them
        $members = $club->members;
        foreach ($members as $member) {
            if ($member->id !== auth()->id()) {
                $member->notify(new ClubNotification($club, "New Post: " . $post->title));
            }
        }

        return redirect()->back()->with('success', 'Post created and members notified!');
    }

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
