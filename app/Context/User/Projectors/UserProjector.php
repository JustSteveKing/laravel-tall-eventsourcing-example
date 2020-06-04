<?php

namespace App\Context\User\Projectors;

use App\Context\User\Models\User;
use App\Context\User\Events\UserCreated;
use Spatie\EventSourcing\Projectors\Projector;
use Spatie\EventSourcing\Projectors\ProjectsEvents;

class UserProjector implements Projector
{
    use ProjectsEvents;

    /**
     * Creates a new user
     * 
     * @param UserCreated $event
     * @param string $aggregateUuid
     * 
     * @return void
     */
    public function onUserCreated(UserCreated $event, string $aggregateUuid)
    {
        User::create([
            'uuid' => $aggregateUuid,
            'name' => $event->name,
            'email' => $event->email,
            'password' => $event->password
        ]);
    }
}
