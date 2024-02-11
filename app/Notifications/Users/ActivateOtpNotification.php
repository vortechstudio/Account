<?php

namespace App\Notifications\Users;

use App\Models\User\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivateOtpNotification extends Notification
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
            ->subject("Activation de l'authentification OTP sur votre compte")
            ->view("mails.user.activate_otp", [
                "user" => $this->user
            ]);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
