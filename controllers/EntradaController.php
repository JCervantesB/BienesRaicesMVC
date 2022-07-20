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

    public static function crear(Router $router) {
        
        $entrada = new Entrada();
        $usuarioId = Admin::all();
        //Arreglo con mensaje de errores 
        $errores = Entrada::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            /* Crea una nueva instancia */
            $entrada = new Entrada($_POST['entrada']);
    
            /** Subida de archivos **/
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
    
            /*Setear la imagen*/
            //Realiza un resize a la imagen con intervention
            if ($_FILES['entrada']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entrada->setImagen($nombreImagen);
            }
    
            /*Validar */
            $errores = $entrada->validar();
            
            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)) {
                //Crear una carpeta
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
    
                //Guarda en la base de datos
                $resultado = $entrada->guardar();

                if($resultado) {
                    header('Location: /blog/admin');
                }
                
            }   
        }

        $router->render('blog/crear', [
            'entrada' => $entrada,
            'usuarioId' => $usuarioId,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/blog/admin');

        $entrada = Entrada::find($id);
        $errores = Entrada::getErrores();
        $usuarioId = Admin::all();

        //Metodo post para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asignar los atributos
            $args = $_POST['entrada'];
            $entrada->sincronizar($args);
    
            $errores = $entrada->validar();
            
            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)) {
                
                if ($_FILES['entrada']['tmp_name']['imagen']) {
                    
                    //Generar un nombre único
                    $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
    
                    //Realiza un resize a la imagen con intervention
                    $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
    
                    /*Setear la imagen*/
                    $entrada->setImagen($nombreImagen);
    
                    //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
    
                $entrada->guardar();
            }   
        }

        $router->render('blog/actualizar', [
            'entrada' => $entrada,
            'usuarioId' => $usuarioId,
            'errores' => $errores
        ]);
        
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            //Validar ID
            if ($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $entrada = Entrada::find($id);
                    $entrada->eliminar();
                }
            }
        }
    }
    
}