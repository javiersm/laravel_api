<?php

namespace App\Notifications;

use App\Model\Product;
use App\Model\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReview extends Notification implements ShouldQueue
{
    use Queueable;

    protected $review, $product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Product $product, Review $review)
    {
        $this->product = $product;
        $this->review = $review;


//        dd($review->review);

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(__('Nuevo comentario en producto'))
                    ->line(__('Nueva valoración en producto :producto', ['producto' => $this->product->name]))
                    ->action('Puedes ver el comentario aqui', url($this->product->url()))
                    ->line(__('Comentario: :comentario ', ['comentario' => $this->review->review]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
