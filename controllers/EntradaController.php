<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Entrada;

class EntradaController {
    public static function index(Router $router) {

        $entradas = Entrada::all();
        $usuarioId = Admin::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('blog/admin', [
            'entradas' => $entradas,
            'resultado' => $resultado,
            'usuarioId' => $usuarioId
        ]);
    }
    
}