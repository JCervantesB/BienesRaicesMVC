<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::get(3);
        $inicio = true;
        
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router) {
        
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router) {
       
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        // Buscar propiedad por su id
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {
        
        $router->render('paginas/blog', [

        ]);
    }
    public static function entrada(Router $router) {
        
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            debuguear($_POST);
        }
        
        $router->render('paginas/contacto', [

        ]);
    }

    //Login
    public static function login(Router $router) {
        $db = conectarDB();
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = mysqli_real_escape_string( $db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
    
            $password = mysqli_real_escape_string($db, $_POST['password']);
    
            //Validando el error
            if(!$email) {
                $errores[] = "El email es obligatorio o no es válido";
            }
            if(!$password) {
                $errores[] = "La contraseña es obligatoria";
            }
    
            // Validar la cuenta
            if(empty($errores)) {
                // Revisar si el usuario existe
                $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
                $resultado = mysqli_query($db, $query);
                
                if($resultado->num_rows) {
    
                    // Revisar si el password es correcto
                    $usuario = mysqli_fetch_assoc($resultado);
    
                    // Verificar si el password es correcto o no
                    $auth = password_verify($password, $usuario['password']);
    
                    if($auth) {
                        //El usuario esta autenticado
                        session_start();
    
                        // Llenar el arreglo de la sesión
                        $_SESSION['usuario'] = $usuario['email'];
                        $_SESSION['login'] = true;
    
                        header('Location: /admin');
    
                    } else {
                        $errores[] = "La contraseña es incorrecta";
                    }
    
                } else {
                    $errores[] = "El usuario no existe";
                }
            
            }
        }
        
        $router->render('paginas/login', [
            'errores' => $errores,
        ]);
    }
    // Cerrar Sesion
    public static function cerrar_sesion(Router $router) {
        session_start();
        $_SESSION = [];
        $router->render('paginas/cerrar-sesion', [
            
        ]);
    }
}