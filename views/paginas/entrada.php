<main class="contenedor seccion contenido-centrado">
    
    <h1><?php echo $entrada->titulo; ?></h1>
    
    <picture>
        <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen; ?>" alt="imagen de la propiedad">
    </picture>
    <?php foreach($usuarioId as $usuario): ?>
        <?php if($entrada->usuarioId === $usuario->id) : ?>
    <p class="informacion-meta">Escritorio el: <span><?php echo $entrada->creado . ''; ?></span> por: <span><?php echo ($usuario->nombre); ?></span></p>
        <?php endif; ?>
    <?php endforeach;?>
    <div class="resumen-propiedad">         
        <p>
            <?php echo $entrada->contenido; ?>
        </p>
    </div>
</main>