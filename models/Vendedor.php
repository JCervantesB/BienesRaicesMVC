<?php 

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnaBD = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $tipo = 'Vendedor';
    
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if(!$this->nombre)
            self::$errores[] = "El nombre es obligatorio";

        if(!$this->apellido)
            self::$errores[] = "El apellido es obligatorio";

        if(!$this->telefono)
            self::$errores[] = "El teléfono es obligatorio";

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Formato de teléfono no válido";
        }

        return self::$errores;
    }
}