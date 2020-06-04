<?php

namespace App\Context\User\Events;

use Spatie\EventSourcing\ShouldBeStored;

class EmailVerified implements ShouldBeStored
{
    public $uuid;

    public $verifiedAt;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
        $this->verifiedAt = now();
    }
}
