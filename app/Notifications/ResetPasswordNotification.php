<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     */
    public string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Recuperá tu contraseña - WebinizaDev Shop')
            ->greeting('Hola,')
            ->line('Estás recibiendo este correo porque solicitaste restablecer la contraseña de tu cuenta en **WebinizaDev Shop**.')
            ->action('Restablecer contraseña', $url)
            ->line('Este enlace de restablecimiento de contraseña expirará en **' . config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') . ' minutos**.')
            ->line('Si no solicitaste restablecer tu contraseña, no necesitás realizar ninguna acción. Tu cuenta está segura.')
            ->salutation('Saludos, **El equipo de WebinizaDev Shop**');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
