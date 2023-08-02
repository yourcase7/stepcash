<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClaimRewardNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $reward;
    public function __construct($reward)
    {
        $this->reward = $reward;
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
        return (new MailMessage)
            ->subject('Konfirmasi Penukaran Hadiah')
            ->greeting('Selamat Penukaran Hadiah Berhasil')
            ->line('Silahkan tunjukkan mail inbox ini kepada pemilik/kasir UMKM untuk pengambilan hadiah langsung.')
            ->line('CODE ID : 0000' . $this->reward->id)
            ->line('REWARD NAME: ' . $this->reward->title)
            // ->action('Notification Action', url('/'))
            ->line('Terima kasih telah menggunakan StepCash, semoga kamu bugar selalu!');
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
