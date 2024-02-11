<?php

namespace App\Notifications\Users;

use App\Models\User\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateMailNotification extends Notification
{
    public function __construct(public User $user)
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Mise à jours des informations de votre compte")
            ->view("mails.user.update_mail", [
                "user" => $this->user
            ]);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
