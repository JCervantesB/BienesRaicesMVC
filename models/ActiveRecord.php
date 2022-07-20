<?php 

namespace Model;

class ActiveRecord{
    //base de datos
    protected static $db;
    protected static $columnaBD = [];
    protected static $tabla = '';
    
    //Errores
    protected static $errores = [];

    //Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar() {
        $resultado = '';
        if(!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // crea un nuevo registro
    public function crear() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar() {

        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);

        return $resultado;
    }


    //Eliminar un registro
    public function eliminar(){
        $query = " DELETE FROM ". static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        if (self::$db->query($query)) {
            $this->eliminarImagen();
            if($this->tipo === 'Entrada') {
                header('Location: /blog/admin?resultado=3&id='.$this->id.'&tipo='.$this->tipo);
            } else {
                header('Location: /admin?resultado=3&id='.$this->id.'&tipo='.$this->tipo);
            }
        }
    }
    
    public function sanitizarAtributos(){
        $atributos =  $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    
    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach (static::$columnaBD as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }


    //Subida de archivos
    public function setImagen($imagen){
        //Elimina la imagen previa
        if (!is_null($this->id))
            $this->eliminarImagen();

        //Asignar al atributo el nombre de la imagen
        if ($imagen)
            $this->imagen = $imagen;
    }

    //Elimina el archivo
    public function eliminarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    
    //Validación
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores =[];
        return static::$errores;
    }

    //Lista todas los registros
    public static function all(){
        $query = "SELECT * FROM ". static::$tabla; //Static hereda este método y busca en la clase em la cual se está llamando
        return self::consultarSQL($query);
    }

    //Obtiene determinado número de registros
    public static function get($limit){
        $query = "SELECT * FROM ". static::$tabla ." LIMIT " . $limit; //Static hereda este método y busca en la clase em la cual se está llamando
        return self::consultarSQL($query);
    }

    //Busca el registro por su ID
    public static function find($id){
        $query = " SELECT * FROM ". static::$tabla ." WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        
        //Retorna el primer elemento de un arreglo
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la BD
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key))
                $objeto->$key = $value;
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}