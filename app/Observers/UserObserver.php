<?php

namespace App\Observers;

use App\Mail\WelcomeMail;
use App\Models\User\User;
use App\Notifications\Users\WelcomeNotification;

class UserObserver
{
    public function created(User $user): void
    {
        $user->logs()->create([
            "action" => "Création du compte utilisateur"
        ]);

        $user->services()->create([
            "status" => true,
            "premium" => false,
            "user_id" => $user->id,
            "service_id" => 1,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        $user->logs()->create([
            "action" => "Lien vers les services de base effectuer"
        ]);

        $user->profil()->create([
            "user_id" => $user->id,
        ]);

        $user->logs()->create([
            "action" => "Profil de l'utilisateur créer"
        ]);

        $user->notify(new WelcomeNotification($user));
    }

    public function updated(User $user): void
    {
    }

    public function deleted(User $user): void
    {
    }
}
