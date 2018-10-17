<?php

namespace Tests\Feature\integration;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Mail\Message;
use App\Repositories\EloquentMessages;

class EloquentMessagesTest extends TestCase
{
    /** @before */
    public function create_new_repo_instance()
    {
        $this->repo = new EloquentMessages;
    }
    /** @test */
    public function it_returns_paginated_messages()
    {
        //Given - Teniendo más de 10 mensajes
        $messages = factory(Message::class, 15)->create();
        dd($result->toArray());
        //When - Cuando ejecutamos el método getPaginated
        $result = $this->repo->getPaginated();

        //Then - Entoncesdebemos obtener 10 mensajes
    }
}
