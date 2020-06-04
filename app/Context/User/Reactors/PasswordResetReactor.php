<?php

namespace App\Context\User\Reactors;

use App\Context\User\Models\User;
use App\Context\User\Events\PasswordReset;
use App\Context\User\Notifications\PasswordUpdated;
use Spatie\EventSourcing\EventHandlers\EventHandler;
use Spatie\EventSourcing\EventHandlers\HandlesEvents;

class PasswordResetReactor implements EventHandler
{
    use HandlesEvents;

    public function onPasswordReset(PasswordReset $event)
    {
        $user = User::uuid($event->uuid);

        $user->update([
            'password' => $event->password
        ]);

        $user->notify(new PasswordUpdated());
    }
}
