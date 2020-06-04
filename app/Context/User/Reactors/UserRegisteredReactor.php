<?php

namespace App\Context\User\Reactors;

use App\Context\User\Models\User;
use App\Context\User\Events\UserCreated;
use Spatie\EventSourcing\EventHandlers\EventHandler;
use Spatie\EventSourcing\EventHandlers\HandlesEvents;

class UserRegisteredReactor implements EventHandler
{
    use HandlesEvents;

    public function onUserCreated(UserCreated $event)
    {
        $user = User::where('email', $event->email)->first();

        $user->sendEmailVerificationNotification();
    }
}
