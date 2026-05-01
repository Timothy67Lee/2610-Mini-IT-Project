<?php

namespace App\Enums;

enum ClubRole: string
{
    case PRESIDENT = 'president';
    case VICE_PRESIDENT = 'vice_president';
    case COMMITTEE = 'committee';
    case MEMBER = 'member';

    public function label(): string
    {
        return match ($this) {
            self::PRESIDENT => 'President',
            self::VICE_PRESIDENT => 'Vice President',
            self::COMMITTEE => 'Committee',
            self::MEMBER => 'Member',
        };
    }
}