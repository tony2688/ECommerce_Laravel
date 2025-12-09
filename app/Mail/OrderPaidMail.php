<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPaidMail extends Mailable
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
        return $this->subject('Pago confirmado - Pedido #' . $this->order->id)
            ->markdown('emails.orders.order-paid');
    }
}
