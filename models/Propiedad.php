<?php 
namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnaBD = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    public $tipo = 'Anuncio';

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    // Obtener último registro de la tabla con myqli_fetch_assoc()
    public static function last() {
        $db = conectarDB();
        $sql = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT 1";
        $result = $db->query($sql);
        $db->close();
        return $result->fetch_assoc();
    }
    // Generar un id consecutivo
    public static function generarId() {
        $last = static::last();
        if ($last) {
            return $last['id'] + 1;
        } else {
            return 1;
        }
    }

    public function validar(){
        if(!$this->titulo)
            self::$errores[] = "Debes añadir un titulo";

        if(!$this->id)
            self::$errores[] = "Propiedad no encontrada";

        if (!$this->precio) 
            self::$errores[] = "El precio es obligatorio";
            
        if ( strlen ( $this->descripcion ) < 50)
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";

        if (!$this->habitaciones) 
            self::$errores[] = "El número de habitaciones es obligatorio";

        if (!$this->wc) 
            self::$errores[] = "El número de baños es obligatorio";

        if (!$this->estacionamiento)
            self::$errores[] = "El número de lugares de estacionamiento es obligatorio";

        if (!$this->vendedorId) 
            self::$errores[] = "Elige un vendedor";

         if (!$this->imagen)
             self::$errores[] = "La imagen es obligatoria";

        return self::$errores;
    }
}
