<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            //debuguear($this->rutasGET);
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if($fn) {
            // La URL existe
            call_user_func($fn, $this);

        } else {
           $this->e404();
        }
    }

    // Muestra una vista
    public function render($view, $datos = []) {
        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Inicia el almacenamiento en memoria
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia la memoria

        include __DIR__ . "/views/layout.php";
    }

    //Redireccionar una pagina 404
    public function e404() {      
        ob_start(); // Inicia el almacenamiento en memoria
        include __DIR__ . "/views/error404.php";

        $contenido = ob_get_clean(); // Limpia la memoria

        include __DIR__ . "/views/layout.php";  
    }
}