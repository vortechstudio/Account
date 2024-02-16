<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSocial extends Model
{
    protected $guarded = [];

    protected $appends = [
        'icon_provider',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getIconProviderAttribute()
    {
        return match ($this->provider) {
            'facebook' => asset('/media/svg/brand-logos/facebook-1.svg'),
            'google' => asset('/media/svg/brand-logos/google-icon.svg'),
            'steam' => asset('media/svg/brand-logos/steam.png'),
            'battlenet' => asset('media/svg/brand-logos/battlenet.png'),
            'discord' => asset('media/svg/brand-logos/discord.png'),
            'twitch' => asset('media/svg/brand-logos/twitch.svg')
        };
    }
}
