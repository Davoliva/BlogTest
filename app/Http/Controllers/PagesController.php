<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    public function home()
    {
       return view('home');
    }

    public function saludo($nombre = 'Invitado')
    {
        $html = "<h2>Contenido html</h2>";//ingresar formulario
        $script = "<script>alert('Problema XSS - Cross Site Scripting!')</script>";//ingresar formulario
    
        $consolas = [
            "Play Station 4",
            "Xbox One",
            "Wii U"
        ];
    
        return view('saludo', compact('nombre','html', 'script', 'consolas'));
    }

}
