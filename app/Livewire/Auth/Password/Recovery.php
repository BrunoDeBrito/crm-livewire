<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use App\Notifications\PasswordRecoveryNotification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Recovery extends Component
{
    public ?string $message = null;

    #[Rule(['required', 'email'])]
    public ?string $email = null;
    #[Layout("components.layouts.guest")]
    public function render()
    {
        return view('livewire.auth.password.recovery');
    }

    public function startPasswordRecovery()
    {
        $this->validate();
        $user = User::whereEmail($this->email)->first();

        $user?->notify(new PasswordRecoveryNotification());

        $this->message = 'You will receive an email with password recovery link.';

        $this->reset('email');
    }
}
