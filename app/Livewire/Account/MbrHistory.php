<?php

namespace App\Livewire\Account;

use App\Models\User\UserLog;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class MbrHistory extends Component
{
    use WithPagination;

    public string $search = '';

    public string $orderField = 'action';

    public string $orderDirection = 'ASC';

    protected $queryString = [
        'search' => ['except' => ''],
        'orderField' => ['except' => 'action'],
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

    #[Title('Historique du compte')]
    public function render()
    {
        return view('livewire.account.mbr-history', [
            'logs' => UserLog::where('user_id', auth()->user()->id)
                ->where('action', 'LIKE', "%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5),
        ]);
    }
}
