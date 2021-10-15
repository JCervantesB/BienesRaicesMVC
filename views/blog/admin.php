<main class="contenedor seccion">
        <h1>Administrador de Blogs</h1>
        <?php 
            if($resultado) {
                $mensaje = mostrarNotificacion( intval($resultado));
                if($mensaje) { ?>
                    <p class="alerta exito"><?php echo ($mensaje) ?></p>
                <?php }
            }
            ?>

        <a href="/propiedades/crear" class="boton boton-verde">Nueva Entrada</a>
        <h2>Publicaciones</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>  <!--Mostrar los resultados-->
                <?php foreach( $entradas as $entrada): ?>
                    <tr>
                        <td><?php echo $entrada->id; ?></td>
                        <td><?php echo $entrada->titulo; ?></td>
                        <td><img src="/imagenes/<?php echo $entrada->imagen; ?>" class="imagen-tabla" alt=""></td>
                        <td><?php echo $entrada->descripcion; ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <!-- <img src="/build/img/trash-alt.svg" class="icono-boton"> -->
                                
                            </a>
                            <a href="/propiedades/actualizar?id=<?php echo $entrada->id; ?>" class="boton-amarillo-block">
                                <img src="/build/img/edit.svg" class="icono-boton editar">
                                Actualizar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>