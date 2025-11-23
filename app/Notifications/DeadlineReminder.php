<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DeadlineReminder extends Notification
{
    use Queueable;

    public $item;
    public $daysLeft;

    public function __construct($item, $daysLeft)
    {
        $this->item = $item;
        $this->daysLeft = $daysLeft;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->item->title,
            'message' => "Sisa $this->daysLeft hari lagi untuk mendaftar!",
            'picture' => $this->item->picture,
            'category_id' => $this->item->category_id,
            'item_id' => $this->item->id,
        ];
    }
}
