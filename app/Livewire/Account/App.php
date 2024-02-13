<?php

namespace App\Livewire\Account;

use App\Models\User\User;
use App\Notifications\Users\UpdateMailNotification;
use App\Notifications\Users\UpdatePasswordNotification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

class App extends Component
{
    use LivewireAlert;
    public $current_password = '';
    public $new_password = '';
    public $email = '';
    public $user;

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->user = User::find(auth()->user()->id);
    }

    public function updatePassword()
    {
        $this->validate([
            "new_password" => "required|min:8",
        ]);

        if($this->current_password == $this->new_password) {
            $this->alert('warning', "Vous ne pouvez pas définir le nouveau mot de passe par son ancien");
        }

        auth()->user()->update([
            "password" => \Hash::make($this->new_password)
        ]);

        auth()->user()->notify(new UpdatePasswordNotification($this->user));

        $this->alert("success", "Mot de passe modifier avec succès");
    }

    public function updateMail()
    {
        $this->validate([
            "email" => "required|email"
        ]);

        $this->user->update([
            "email" => $this->email
        ]);

        auth()->user()->notify(new UpdateMailNotification($this->user));

        $this->alert("success", "Adresse Mail modifier avec succès");
    }

    public function closeAccount()
    {
        try {
            $this->user->delete();
        }catch (\Exception $exception) {
            \Log::emergency($exception->getMessage(), ["context" => $exception]);
        }

        $this->alert("success","Compte supprimer avec succès");
        return redirect()->route('auth.login');
    }

    #[Title("Informations")]
    public function render()
    {
        return view('livewire.account.app')
            ->layout("components.layouts.app");
    }
}
