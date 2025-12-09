<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order
    ) {
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->subject('Pedido #' . $this->order->id . ' confirmado - WebinizaDev Shop')
            ->markdown('emails.orders.order-created');
    }
}
