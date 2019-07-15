<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name,$order_code,$payment_type;

    public function __construct($order_code,$name,$payment_type)
    {
        $this->name = $name;
        $this->order_code = $order_code;
        $this->payment_type = $payment_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.order_confirmed',

            [
                'name'=>$this->name,
                'order_code' => $this->order_code,
                'payment_type' => $this->payment_type
            ]

        )->subject("Order Confirmed");

    }
}
