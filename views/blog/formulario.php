<fieldset>
    <legend>Entrada de Blog</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="entrada[titulo]" placeholder="Titulo de la entrada" value="<?php echo sane( $entrada->titulo ); ?>" >

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg image/png" name="entrada[imagen]">
    <?php if($entrada->imagen):?>
        <img src="/imagenes/<?php echo $entrada->imagen?>" class="imagen-small" alt="<?php echo "Imagen ".$entrada->titulo?>">
    <?php endif;?>
        
    <label for="descripcion">Descripción Breve:</label>
    <input type="text" id="descripcion" name="entrada[descripcion]" placeholder="Descripción breve del articulo" value="<?php echo sane( $entrada->descripcion ); ?>" >
    <label for="contenido">Contenido:</label>
    <textarea name="entrada[contenido]" id="articulo" cols="30" rows="10"><?php echo sane($entrada->contenido);?></textarea>

</fieldset>
<fieldset>
    <legend>Usuario</legend>
    <label for="vendedor">Usuario</label>
    <select name="entrada[usuarioId]" id="usuario">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($usuarioId as $usuario): ?>
            <option <?php echo $entrada->usuarioId === $usuario->id ? 'selected' : ''; ?> value="<?php echo sane($usuario->id); ?>"><?php echo sane($usuario->nombre); ?></option>
        <?php endforeach;?>
    </select>
    
</fieldset>