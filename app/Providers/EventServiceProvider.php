<?php

namespace App\Providers;

use App\Models\User\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Google\GoogleExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            \SocialiteProviders\Facebook\FacebookExtendSocialite::class.'@handle',
            GoogleExtendSocialite::class.'@handle',
            \SocialiteProviders\Steam\SteamExtendSocialite::class.'@handle',
            \SocialiteProviders\Battlenet\BattlenetExtendSocialite::class.'@handle',
            \SocialiteProviders\Discord\DiscordExtendSocialite::class.'@handle',
            \SocialiteProviders\Twitch\TwitchExtendSocialite::class.'@handle',
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        User::observe(new UserObserver());
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
