<?php

namespace Model;

class Entrada extends ActiveRecord {
    protected static $tabla = "blog";
    protected static $columnaBD = ['id', 'titulo', 'imagen', 'descripcion', 'contenido', 'creado', 'usuarioId'];

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
        $this->contenido = $args['contenido'] ?? '';
        $this->creado = date('Y/m/d');
        $this->usuarioId = $args['usuarioId'] ?? 2;
    }

    public function validar(){
        if(!$this->titulo)
            self::$errores[] = "Debes añadir un titulo";
            
        if ( strlen ( $this->descripcion ) < 20)
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 20 caracteres";

        if ( strlen ( $this->contenido ) < 50)
            self::$errores[] = "El contenido es obligatorio y debe tener al menos 50 caracteres";
        
        if (!$this->usuarioId) 
            self::$errores[] = "Elige tu usuario";

        return self::$errores;
    }

}

