<?php

namespace App\Context\User\Events;

use Spatie\EventSourcing\ShouldBeStored;

class PasswordReset implements ShouldBeStored
{
    public string $uuid;

    public string $password;

    public string $oldPassword;

    public function __construct(string $uuid, string $password, string $oldPassword)
    {
        $this->uuid = $uuid;
        $this->password = $password;
        $this->oldPassword = $oldPassword;
    }
}
