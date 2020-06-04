<?php

namespace App\Context\User\Events;

use Spatie\EventSourcing\ShouldBeStored;

class UserCreated implements ShouldBeStored
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * User Created Constructor
     * 
     * @param string $name
     * @param string $email
     * @param string $password
     * 
     * @return void
     */
    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
