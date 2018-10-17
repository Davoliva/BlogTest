<?php

namespace Tests\Unit;

use App\Http\Controllers\MessagesController;
use Tests\TestCase;
use Mockery;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class MessagesControllerTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndex()
    {
        $messagesRepo = Mockery::mock('App\Repositories\MessagesInterface');
        $view = Mockery::mock('Illuminate\View\Factory');

        $controller = new MessagesController($messagesRepo, $view);

        // Verificar que el messages repository llame al metodo get paginated
        $messagesRepo->shouldReceive('getPaginated')->once()->andReturn('paginated_messages');
        // Asegurar de que el método make sea llamado a través del view factory
        $view->shouldReceive('make')->with('messages.index', ['messages' => 'paginated_messages'])->once();

        $controller->index();

    }
}
