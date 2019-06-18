<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class TestEventListener
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
     * @param  TestEvent $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our Services');

        Mail::send('Backend\MailUsers\subscription', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Welcome to our Website');
            $message->from('nepalallbeverages@gmail.com');
        });

    }
}
