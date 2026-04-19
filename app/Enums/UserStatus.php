<?php

namespace App\Enums;

enum UserStatus: string
{
    case ACTIVE = 'actve';
    case PENDING  = 'pending';
    case BANNED  = 'banned';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::PENDING  => 'Pending',
            self::BANNED  => 'Banned',
        };
    }
}