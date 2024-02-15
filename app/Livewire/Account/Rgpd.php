<?php

namespace App\Livewire\Account;

use Livewire\Attributes\Title;
use Livewire\Component;

class Rgpd extends Component
{
    #[Title('Mes données personnels (RGPD)')]
    public function render()
    {
        return view('livewire.account.rgpd')
            ->layout('components.layouts.app');
    }
}
