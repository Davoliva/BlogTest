<?php

namespace Tests\Feature\functional;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMessageTest extends TestCase
{
    /** @test */
    public function a_guest_user_can_send_messages()
    {
        $response = $this->get('mensajes/create');

        $response->assertStatus(200);
    }
}
