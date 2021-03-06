<h2>Lista de comidas y cenas<a href="comida/anyadir"><i class="icono gg-add-r"></i></a></h2>
<!-- <div class="comidas__header-acciones">
    <a href="comida/anyadir"><i class="icono gg-add-r"></i></a>
</div> -->
<div class="comidas">
    <div class="comidas__header-descripcion">Descripcion</div>
    <div class="comidas__header-entresemana">Entre semana</div>
    <div class="comidas__header-acciones">Acciones</div>
    
    <!-- <?php foreach( $comidas as $comida ):?>
        <div class="comidas__comida">
            <span class="comidas__comida-descripcion">
                <?=$comida->descripcion?>
            </span>
            <div class="comidas__comida-acciones">
                <a href="comida/editar?codigo=<?=$comida->codigo?>"><i class="icono gg-edit-markup"></i></a>
                <a class="comidas__comida-acciones__borrar" href="comida/borrar?codigo=<?=$comida->codigo?>"><i class="icono gg-trash"></i></a>
            </div>
        </div>
    <?php endforeach; ?> -->
    <?php foreach( $comidas as $comida ):?>
        <div class="comidas__comida-descripcion">
            <?=$comida->descripcion?>
        </div>
        <div class="comidas__comida-entresemana">
            <?php if( $comida->esEntresemana ): ?>
                Sí
            <?php else: ?>
                No
            <?php endif; ?>
        </div>
        <div class="comidas__comida-acciones">
            <a href="comida/editar?codigo=<?=$comida->codigo?>"><i class="icono gg-edit-markup"></i></a>
            <a class="comidas__comida-acciones__borrar" href="comida/borrar?codigo=<?=$comida->codigo?>"><i class="icono gg-trash"></i></a>
        </div>
        
    <?php endforeach; ?>
</div>