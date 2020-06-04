<?php

namespace App\Context\User\Reactors;

use App\Context\User\Models\User;
use App\Context\User\Events\EmailVerified;
use Spatie\EventSourcing\EventHandlers\EventHandler;
use Spatie\EventSourcing\EventHandlers\HandlesEvents;

class EmailVerifiedReactor implements EventHandler
{
    use HandlesEvents;

    public function onEmailVerified(EmailVerified $event)
    {
        $user = User::uuid($event->uuid);

        $user->update([
            'email_verified_at' => now()
        ]);
    }
}
