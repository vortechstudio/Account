<?php

namespace App\Providers;

use App\Actions\VersionBuildAction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $version = new VersionBuildAction();
        \View::share([
            'version' => $version->getVersionInfo(),
        ]);
    }
}
