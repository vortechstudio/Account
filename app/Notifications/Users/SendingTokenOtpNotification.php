<?php

namespace App\Notifications\Users;

use App\Models\User\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendingTokenOtpNotification extends Notification
{
    public function __construct(
        public User $user,
        public string $token
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Votre code OTP est: '.$this->token)
            ->view('maileclipse::templates.otpCodeToken', [
                'otp_code' => $this->token,
                'first_name' => $this->user->name,
            ]);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
