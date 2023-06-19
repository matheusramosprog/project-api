<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpenseCreate extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(){}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Despesa cadastrada!')
        ->markdown('emails.expense-create');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
