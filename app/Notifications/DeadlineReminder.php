<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeadlineReminder extends Notification
{
    use Queueable;

    protected $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function via(object $notifiable): array
    {
        // Bisa ke database, email, broadcast, dll
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'pesan' => $this->pesan,
        ];
    }
}
