<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UncategorizedVideosNotification extends Notification
{
    use Queueable;

    protected Collection $videos;
    /**
     * Create a new notification instance.
     */
    public function __construct($videos)
    {
        $this->videos = $videos;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
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
        $videoList = $this->videos->map(function ($video){
            return "ID: {$video->id} | Title: {$video->title} | Tag: {$video->tag}";
        }) -> implode('\n');

        return (new MailMessage)
                    -> subject('Uncategorized Videos Alert')
                    -> line('The following videos need to categorized: ')
                    -> line($videoList)
                    -> action('Review Videos', url('/admin/videos/uncategorized'))
                    -> line('Thank you for your attention!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
