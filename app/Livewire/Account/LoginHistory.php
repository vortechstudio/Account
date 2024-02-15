<?php

namespace App\Livewire\Account;

use IvanoMatteo\LaravelDeviceTracking\LaravelDeviceTracking;
use IvanoMatteo\LaravelDeviceTracking\Models\Device;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class LoginHistory extends Component
{
    use LivewireAlert, WithPagination;

    public string $orderField = 'login_at';

    public string $orderDirection = 'ASC';

    protected $queryString = [
        'orderField' => ['except' => 'login_at'],
        'orderDirection' => ['except' => 'ASC'],
    ];

    public function setOrderField(string $name)
    {
        if ($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function logoutOutDevice(int $id)
    {
        try {
            Device::query()->find($id)
                ->delete();
            $this->alert('success', 'Appareille déconnecter avec succès');
        } catch (\Exception $exception) {
            \Log::emergency($exception->getMessage(), [$exception]);
            $this->alert('error', 'Erreur lors du traitement');
        }
    }

    #[Title('Historique de connexion')]
    public function render()
    {
        $tracking = new LaravelDeviceTracking();

        return view('livewire.account.login-history', [
            'logs' => auth()->user()->authentications()
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5),
            'actual_login' => $tracking->findCurrentDevice(),
            'devices' => auth()->user()->device()->get(),

        ])
            ->layout('components.layouts.app');
    }
}
