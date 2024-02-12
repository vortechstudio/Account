<?php

namespace App\Livewire\Auth;

use App\Models\User\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class SetupRegister extends Component
{
    public $provider;
    public $email;
    public $password;

    public function mount(string $provider, string $email)
    {
        $this->provider = $provider;
        $this->email = $email;
    }

    public function submit()
    {
        $this->validate([
            "password" => "required|min:8"
        ]);

        $user = User::where('email', $this->email)->first();

        $user->update([
            "password" => $this->password
        ]);

        \Auth::login($user);

        return redirect()->route('home');
    }

    #[Title("Setup Account")]
    public function render()
    {
        return view('livewire.auth.setup-register');
    }
}
