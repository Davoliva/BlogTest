<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\TuMensajeFueRecibido;

class SendAutoresponder implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;

        if(auth()->check())
        {
            $message->email = auth()->user()->email;
        }

        Mail::to($message->email)->send(new TuMensajeFueRecibido($message));
    }
}
