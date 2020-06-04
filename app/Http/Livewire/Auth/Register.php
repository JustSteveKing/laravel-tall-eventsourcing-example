<?php

namespace App\Http\Livewire\Auth;

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Context\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Context\User\Aggregates\UserAggregate;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $uuid = Str::uuid()->toString();

        UserAggregate::retrieve($uuid)
            ->createUser(
                $this->name,
                $this->email,
                Hash::make($this->password)
            )->persist();


        $user = User::uuid($uuid);

        Auth::login($user, true);

        redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
