<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Notifications\ClubNotification;

class ClubController extends Controller
{   

        public function index()
    {
        // Temporary hardcoded data until DB is ready
        $clubs = [
            [
                "name" => "MMUsic Club",
                "category" => "Arts Clubs",
                "profile_picture" => "images/1.jpg"
            ],
            [
                "name" => "MMU Superheroes",
                "category" => "Community Clubs",
                "profile_picture" => "images/2.jpg"
            ],
            [
                "name" => "Buddhist Society",
                "category" => "Religious Clubs",
                "profile_picture" => "images/3.png"
            ],
            [
                "name" => "MMU Esports",
                "category" => "Games / Entertainment Clubs",
                "profile_picture" => "images/4.png"
            ],
            [
                "name" => "Chinese Language Society",
                "category" => "Cultural Clubs",
                "profile_picture" => "images/5.png"
            ],
            [
                "name" => "IT Society",
                "category" => "Tech Clubs",
                "profile_picture" => "images/6.jpg"
            ],
            [
                "name" => "Badminton Club",
                "category" => "Recreational / Physical Activities Clubs",
                "profile_picture" => "images/7.jpg"
            ],
            [
                "name" => "CyberFitness Club",
                "category" => "Recreational / Physical Activities Clubs",
                "profile_picture" => "images/8.jpg"
            ],
            [
                "name" => "TechGirls MMU",
                "category" => "Tech Clubs",
                "profile_picture" => "images/9.jpg"
            ],
            [
                "name" => "Rentak Dance Club",
                "category" => "Arts Clubs",
                "profile_picture" => "images/10.jpg"
            ],
            [
                "name" => "Chess Club",
                "category" => "Games / Entertainment Clubs",
                "profile_picture" => "images/11.jpeg"
            ],
            [
                "name" => "University Peer Group",
                "category" => "Community Clubs",
                "profile_picture" => "images/12.png"
            ],
            [
                "name" => "Table Tennis Club",
                "category" => "Recreational / Physical Activities Clubs",
                "profile_picture" => "images/13.png"
            ],
        ];

        return view('navigation', compact('clubs'));
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
