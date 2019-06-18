<?php

namespace App\Listeners;

use App\Events\productlistners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class products
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  products  $event
     * @return void
     */
    public function handle(products $event)
    {
        $data = array('email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our Services');

        Mail::send('Backend\MailUsers\subscription', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Welcome to our Website');
            $message->from('nepalallbeverages@gmail.com');
        });
    }
}
