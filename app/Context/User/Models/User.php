<?php

namespace App\Context\User\Models;

use Ramsey\Uuid\Uuid;
use App\Context\User\Events\UserCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createWithAttributes(array $attributes): User
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new UserCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public static function uuid(string $uuid): ?User
    {
        return static::where('uuid', $uuid)->first();
    }
}
