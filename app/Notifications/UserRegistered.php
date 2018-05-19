<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->markdown('mail.user.registered')
            ->from('welcome@staya.bg')
            ->subject('Здравей,' . $this->user->nickname)
            ->greeting('Хей,' . $this->user->nickname)
            ->line('Радостни сме да те видим в нашата платформа.')
            ->line('С регистрацията си в ' . config('app.name') . 'се надяваме да намериш твоята квартира бързо,лесно и удбоно.')
            ->line('Започни търсенето сега и се запознай с новият си съквратирант')
            ->action('Намери съквартирант', url('/'))
            ->line('Благодрим ти,че изолзваш услугите на ' . config('app.name') . ' !');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
