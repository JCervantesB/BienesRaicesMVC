<?php foreach($entradas as $entrada): ?>
<article class="entrada-blog">
<div class="imagen">
    <img src="/imagenes/<?php echo $entrada->imagen; ?>" alt="Entrada" loading="lazy">
</div>
<div class="texto-entrada">
    <a href="/entrada?id=<?php echo $entrada->id; ?>">
        <h4><?php echo $entrada->titulo; ?></h4>
        <p class="informacion-meta">Escritorio el: <span><?php echo $entrada->creado . ''; ?></span> por: <span>Admin</span></p>

        <p>
        <?php echo $entrada->descripcion; ?>
        </p>
    </a>
</div>
</article>
<?php endforeach; ?>
