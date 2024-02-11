<?php

namespace App\Models\User;

use App\Models\Config\Service;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
