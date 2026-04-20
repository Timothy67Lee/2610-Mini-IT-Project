<?php

namespace App\Enums;

enum ClubCategory: string
{
    case STUDENT = 'student';
    case SPORTS = 'sports';
    case PERFORM = 'perform';
    case CULTURE = 'culture';
    case INTERNATIONAL = 'international';
    case TECHNOLOGY = 'technology';

    // Optional: Helper method for labels
    public function label(): string
    {
        return match($this) {
            self::STUDENT => 'Student Bodies',
            self::SPORTS => 'Sports',
            self::PERFORM => 'Performing Arts',
            self::CULTURE => 'Culture',
            self::INTERNATIONAL => 'International Clubs',
            self::TECHNOLOGY => 'Technology & Engineering',
        };
    }
}