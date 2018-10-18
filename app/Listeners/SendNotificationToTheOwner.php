<?php

namespace App\Listeners;

use Mail;
use \App\Mail\MensajeRecibido;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner implements ShouldQueue
{


    public function handle(MessageWasReceived $event)
    {

        // var_dump('Notificar al dueño);
        $message = $event->message;

        if(auth()->check())
        {
            $message->nombre = auth()->user()->name;
            $message->email = auth()->user()->email;
        }

        Mail::to('admin@email.com', 'David')->send(new MensajeRecibido($message));

    }
}
