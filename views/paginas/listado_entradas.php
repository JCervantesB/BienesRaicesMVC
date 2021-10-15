<?php foreach($entradas as $entrada): ?>
    
    <article class="entrada-blog">
        <div class="imagen">
            <img src="/imagenes/<?php echo $entrada->imagen; ?>" alt="Entrada" loading="lazy">
        </div>
        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $entrada->id; ?>">
            <h4><?php echo $entrada->titulo; ?></h4>
            
            <?php foreach($usuarioId as $usuario): ?>
            <?php if($entrada->usuarioId === $usuario->id) : ?>
                <p class="informacion-meta">Escritorio el: <span><?php echo $entrada->creado . ''; ?></span> por: <span><?php echo ($usuario->nombre); ?></span></p>
                <?php endif; ?>
            <?php endforeach;?>
            
            <p>
            <?php echo $entrada->descripcion; ?>
            </p>
            </a>
        </div>
    </article>
<?php endforeach; ?>
