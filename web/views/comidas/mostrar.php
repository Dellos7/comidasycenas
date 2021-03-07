<h2>Lista de comidas y cenas<a href="comida/anyadir"><i class="icono gg-add-r"></i></a></h2>
<!-- <div class="comidas__header-acciones">
    <a href="comida/anyadir"><i class="icono gg-add-r"></i></a>
</div> -->
<div class="comidas">
    <div class="comidas__header-descripcion">Descripción</div>
    <!-- <div class="comidas__header-entresemana">Entre semana</div>
    <div class="comidas__header-cena">Cena</div> -->
    <div class="comidas__header-acciones">Acciones</div>

    <?php foreach( $comidas as $comida ):?>
        <div class="comidas__comida-descripcion" data-comida-codigo="<?=$comida->codigo?>">
            <?=$comida->descripcion?>
        </div>
        <!-- <div class="comidas__comida-entresemana" data-comida-codigo="<?=$comida->codigo?>">
            <?php if( $comida->esEntresemana ): ?>
                Sí
            <?php else: ?>
                No
            <?php endif; ?>
        </div>
        <div class="comidas__comida-cena" data-comida-codigo="<?=$comida->codigo?>">
            <?php if( $comida->esCena ): ?>
                Sí
            <?php else: ?>
                No
            <?php endif; ?>
        </div> -->
        <div class="comidas__comida-acciones" data-comida-codigo="<?=$comida->codigo?>">
            <a href="comida/editar?codigo=<?=$comida->codigo?>"><i class="icono gg-edit-markup"></i></a>
            <a class="comidas__comida-acciones__borrar" href="" onclick="borrarComida(event, <?=$comida->codigo?>)"><i class="icono gg-trash"></i></a>
        </div>
        
    <?php endforeach; ?>
</div>