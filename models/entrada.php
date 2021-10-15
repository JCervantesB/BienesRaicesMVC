<?php

namespace Model;

class Entrada extends ActiveRecord {
    protected static $tabla = "blog";
    protected static $columnaBD = ['id', 'titulo', 'imagen', 'descripcion', 'creado', 'usuarioId'];

    public $id;
    public $titulo;
    public $imagen;
    public $descripcion;
    public $contenido;
    public $creado;
    public $usuarioId;
    public $tipo = 'Entrada';

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->descripcion = $args['contenido'] ?? '';
        $this->creado = date('Y/m/d');
        $this->usuarioId = $args['usuarioId'] ?? '';
    }

    public function validar(){
        if(!$this->titulo)
            self::$errores[] = "Debes añadir un titulo";
            
        if ( strlen ( $this->descripcion ) < 50)
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";

         if (!$this->imagen)
             self::$errores[] = "La imagen es obligatoria";

        return self::$errores;
    }

}

