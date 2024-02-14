<?php

namespace App\Notifications\Users;

use App\Models\User\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdatePasswordNotification extends Notification
{
    public function __construct(
        public User $user
    )
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Activité sur votre compte Vortech Studio")
            ->greeting("Bonjour {$this->user->name} !")
            ->line("Une modification de votre mot de passe à été effectuer ce jour à ".now()->format("H:i")." par l'intermédiaire de votre espace.")
            ->line("Si vous n'êtes pas à l'origine de cette modification, veuillez contacter un administrateur au plus vite!")
            ->salutation("Cordialement");
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
