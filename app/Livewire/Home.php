<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Home extends Component
{
    #[Title("Bienvenue")]
    public function render()
    {
        return view('livewire.home')->layout('components.layouts.app');
    }
}
