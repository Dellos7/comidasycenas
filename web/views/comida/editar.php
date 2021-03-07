<?php ?>

<?php if($editando):?>
    <h2>Editando comida</h2>
<?php else: ?>
    <h2>Añadiendo comida</h2>
<?php endif; ?>
<form class="form-editar-comida" method="post" action="comida/guardar">
    <?php if($comida && $comida->codigo): ?>
        <input type="hidden" name="codigo" value="<?=$comida->codigo?>">
    <?php endif; ?>
    <textarea placeholder="Descripción..." name="descripcion" id="" cols="30" rows="10" required></textarea>
    <div>
        <input id="entresemana" type="checkbox" name="entresemana">
        <label for="entresemana">Entre semana</label>
    </div>
    <div>
        <input id="cena" type="checkbox" name="cena">
        <label for="cena">Cena</label>
    </div>
    <button class="btn azul" type="submit>">Guardar</button>
</form>
<script>
    <?php if($comida): ?>
        const descripcion = "<?=$comida->descripcion?>";
        const esEntreSemana = "<?=$comida->esEntresemana?>";
        const esCena = "<?=$comida->esCena?>";
        document.querySelector( '[name="descripcion"]' ).value = descripcion;
        if( esEntreSemana == 1 ){
            document.querySelector( '[name="entresemana"]' ).setAttribute( 'checked', true );
        }
        if( esCena == 1 ){
            document.querySelector( '[name="cena"]' ).setAttribute( 'checked', true );
        }
    <?php endif; ?>
</script>