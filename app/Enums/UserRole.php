<?php

namespace App\Enums;

enum UserRole: string
{
    case MEMBER = 'member';
    case ADMIN  = 'admin';
    case OWNER  = 'owner';

    public function label(): string
    {
        return match ($this) {
            self::MEMBER => 'Member',
            self::ADMIN  => 'Admin',
            self::OWNER  => 'Owner',
        };
    }
}