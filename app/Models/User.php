<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\UserVerification;
use App\Models\Club;
use App\Models\Event;
use App\Models\Membership;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'role'              => UserRole::class,
            'status'            => UserStatus::class,
            'verification'      => UserVerification::class,
        ];
    }

    // --------------------------
    // Relationships
    // --------------------------

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'user_id');
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'memberships')
                    ->withPivot('role', 'created_at');
    }

    public function events()
    {
        return $this->clubs->flatMap(function ($club) {
            return $club->events;
        });
    }
}