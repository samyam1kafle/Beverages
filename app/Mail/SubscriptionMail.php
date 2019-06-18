<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            $title = 'Congratulations your subscription is successful.';
            $content ='Welcome to Nepal All Beverage family.
              Since you have subscribed to our site you will now get notified for every new products available in our site . 
              ';

        return $this->from('NAB_Nepal@gmail.com')
                     ->view('Backend.mail',compact('title','content'));
    }
}
