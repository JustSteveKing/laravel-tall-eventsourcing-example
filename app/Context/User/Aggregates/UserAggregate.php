<?php

namespace App\Context\User\Aggregates;

use Spatie\EventSourcing\AggregateRoot;
use App\Context\User\Events\UserCreated;
use App\Context\User\Events\EmailVerified;
use App\Context\User\Events\PasswordReset;

class UserAggregate extends AggregateRoot
{

    public function createUser(
        string $name,
        string $email,
        string $password
    ) {
        $this->recordThat(new UserCreated($name, $email, $password));

        return $this;
    }

    public function passwordReset(string $uuid, string $password, string  $oldPassword)
    {
        $this->recordThat(new PasswordReset($uuid, $password, $oldPassword));

        return $this;
    }

    public function emailVerified(string $uuid)
    {
        $this->recordThat(new EmailVerified($uuid));

        return $this;
    }
}
