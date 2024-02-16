<?php

namespace App\Livewire\Service;

use App\Models\User\User;
use App\Models\User\UserService;
use Livewire\Attributes\Title;
use Livewire\Component;

class Service extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }
    #[Title("Etat des services et options")]
    public function render()
    {
        return view('livewire.service.service', [
            "actifs" => $this->user->services()
                ->where('deleted_at', null)
                ->get(),
            "inactifs" => $this->user->services()
                ->where('deleted_at', '!=', null)
                ->get()
        ])
            ->layout("components.layouts.app");
    }
}
