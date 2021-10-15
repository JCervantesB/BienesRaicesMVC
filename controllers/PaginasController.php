<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use Model\Entrada;

class PaginasController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::get(3);
        $entradas = Entrada::get(3);
        
        $inicio = true;
        
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'entradas' => $entradas,
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
        $entradas = Entrada::all();

        $router->render('paginas/blog', [
            'entradas' => $entradas
        ]);
    }
    public static function entrada(Router $router) {
        $id = validarORedireccionar('/blog');

        // Buscar entradas blog por su id
        $entrada = Entrada::find($id);
        
        $router->render('paginas/entrada', [
            'entrada' => $entrada
        ]);
    }

    public static function contacto(Router $router) {
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $respuestas = $_POST['contacto'];
            
            // Crear una nueva instancia PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '6d8136a7f04937';
            $mail->Password = '5573e4fb33dd5b';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';

            // Contenido del email
            $mail->setFrom('admin@solucioncb.com');
            $mail->addAddress('admin@solucioncb.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            
            //Definir Contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje de:</p>';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . ' </p>';
            $contenido .= '<p> Vende/Compra: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= '<p> Precio/Presupuesto: $' . $respuestas['precio'] . ' </p>';

            $contenido .= '<p> Mensaje: ' . $respuestas['mensaje'] . ' </p> <br>';
           
            // Enviar de forma condicional algunos campos de email o teléfono
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p> Eligió ser contactado por teléfono. </p>';
                $contenido .= '<p> Teléfono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p> Fecha para contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p> Hora de contacto: ' . $respuestas['hora'] . ' </p>';

            } else {
                // Es email, entonces agregamos campos de email
                $contenido .= '<p> Eligió ser contactado por email. </p>';
                $contenido .= '<p> Email: ' . $respuestas['email'] . ' </p>';
            }
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es un texto sin HTML';

            // Enviar el email
            if($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }

        }
        
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}