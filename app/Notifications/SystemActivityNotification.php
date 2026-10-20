<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SystemActivityNotification extends Notification
{
    use Queueable;

    private $title;
    private $message;
    private $url;
    private $byUser;

    /**
     * Create a new notification instance.
     */
    public function __construct($title, $message, $url = '#', $byUser = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
        $this->byUser = $byUser ?? (auth()->check() ? auth()->user()->name : 'System');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'by_user' => $this->byUser,
        ];
    }
}
