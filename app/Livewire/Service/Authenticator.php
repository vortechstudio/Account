<?php

namespace App\Livewire\Service;

use App\Models\User\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Authenticator extends Component
{
    public User $user;
    public bool $two_factor_enabled;
    public bool $two_factor_confirm;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->two_factor_enabled = $this->user->two_factor_secret ?? false;
        $this->two_factor_confirm = $this->user->two_factor_confirmed_at ?? false;
    }

    #[Title("Mot de passe à usage unique (MFA)")]
    public function render()
    {
        return view('livewire.service.authenticator')
            ->layout('components.layouts.app');
    }
}
